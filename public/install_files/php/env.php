<?php

defined('LARAVEL_START') or die();

class Env
{

    /**
     * .Env lines
     * @var
     */
    public array $lines = [];

    /**
     * .Env data
     * @var
     */
    public array $data = [];

    /**
     * The constructor.
     */
    public function __construct()
    {
        // init line
        if (empty($this->lines)) {
            $content = file_get_contents(laravel_path('.env'));

            $this->lines = preg_split("/\r\n|\n|\r/", $content);
        }

        // init data
        if (empty($this->data)) {
            foreach ($this->lines as $line) {
                $this->data[] = $this->makeData($line);
            }
        }
    }

    /**
     * Line as .env data filter
     *
     * @param string $data
     * @return array
     */
    private function makeData(string $original_line): array
    {
        // enabled is comment of line
        $enabled = true;
        $line    = $original_line;

        if (substr($line, 0, 1) == '#') {
            $dataArray = explode("#", $line);
            unset($dataArray[0]);
            $line = implode('#', $dataArray);
            $enabled = false;
        }

        //type = line, .env
        $new = array(
            'type'          => 'line',
            'original_line' => $original_line,
            'line'          => $line,
            'key'           => null,
            'value'         => null,
            'enabled'       => $enabled,
        );

        // is env valid data check
        if (strpos($line, '=')) {
            $envData    = explode('=', $line);
            $key        = str_replace(' ', '', trim($envData[0]));
            $value      = "";

            // get value with other stirng or data
            if (isset($envData[1]) == true) {
                unset($envData[0]);
                $value  = implode('=', $envData);
            }

            // make .env data
            $new['key']     = $key;
            $new['value']   = $value;
            $new['type']    = 'env';
        }

        return $new;
    }

    /**
     * Add env data
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function create($keys, string $value = ""): bool
    {
        if (is_array($keys)) {
            foreach ($keys as $key => $v) {
                if (!is_string($v)) {
                    $v = "";
                }

                if (is_string($key)) {
                    $this->create($key, $v);
                }
            }
        }
        if (!is_string($keys) || $this->has((string)$keys)) {
            return false;
        }

        $this->data[] = array(
            'type'          => 'env',
            'original_line' => "{$keys}={$value}",
            'line'          => "{$keys}={$value}",
            'key'           => $keys,
            'value'         => $value,
            'enabled'       => 'true',
        );

        $this->makeLines();

        return $this->save();
    }

    /**
     * Has key
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        foreach ($this->data as $value) {
            if (isset($value['type']) == true && $value['type'] == 'env' && $key == $value['key']) {
                return true;
            }
        }
        return false;
    }

    /**
     * Has key
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $defaule = "")
    {

        foreach ($this->data as $value) {

            if (isset($value['type']) == true && $value['type'] == 'env' && $key == $value['key']) {
                return $value['value'];
            }
        }
        return $defaule;
    }

    /**
     * Update env data
     *
     * @param array $keys
     *
     * @return bool
     */
    public function update(array $keys)
    {
        if (empty($keys)) {
            return true; // No keys to update
        }

        foreach ($keys as $key => $value) {

            if (!is_string($key)) {
                throw new Exception('Invalid env data. Keys must be strings.');
            }

            if (!is_string($value)) {
                throw new Exception('Invalid env data. Values must be strings.');
            }

            $this->set($key, (string)$value);
        }

        return true;
    }

    /**
     * set Env data
     *
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function set(string $key, string $value): bool{

        if (!$this->has($key)) {
            throw new Exception("Key '{$key}' not found in .env file.");
        }

        foreach ($this->data as $k => $v) {

            if (isset($v['key']) == true && $v['key'] == $key) {
                $this->data[$k] = array(
                    "type"          => "env",
                    "original_line" => "{$key}={$value}",
                    "line"          => "{$key}={$value}",
                    "key"           => "{$key}",
                    "value"         => "{$value}",
                    "enabled"       => true
                );
                $this->makeLines();
                return $this->save();
            }
        }
        return true;
    }

    /**
     * if .env not found copy form .env.example
     *
     * @return boolean
     */
    public function copyFormExample()
    {
        if (!file_exists( laravel_path('.env.example') )) {
            return false;
        }
        try {
            file_put_contents(
                laravel_path('.env'),
                file_get_contents(laravel_path('/.env.example'))
            );
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }

    /**
     * Remove env data
     * @param array|string $keys
     * @return bool
     */
    public function destroy($keys)
    {
        // mailty data handle
        if (is_array($keys)) {
            foreach ($keys as $key) {
                if (is_string($key)) {
                    $this->destroy($key);
                }
            }
        }

        // oparation
        if (is_string($keys)) {
            foreach ($this->data as $key => $value) {
                if (isset($value['key']) && $value['key'] == $keys) {

                    $this->data[$key] = array(
                        "type"          => "line",
                        "original_line" => "",
                        "line"          => "",
                        "key"           => null,
                        "value"         => null,
                        "enabled"       => false
                    );

                    # ensure all remove lines
                    if ($this->has($value['key'])) {
                        $this->destroy($value['key']);
                    }

                    // make lines
                    $this->makeLines();

                    // update content
                    return $this->save();
                }
            }
        }
        return true;
    }

    /**
     * Make lines
     * @return Env
     */
    public function makeLines()
    {
        $lines = [];
        foreach ($this->data as $value) {

            // start line
            $line = '';
            if ($value['enabled'] == false) {

                if ($value['type'] == 'line' && strlen($value['line']) > 1) {
                    $line = '#';
                }
                // plain line
                $lines[] = $line . $value['line'];
            } else {
                $lines[] = $value['line'];
            }
        }
        $this->lines = $lines;
        return $this;
    }

    /**
     * Remove duplicate data
     * remove comment off data first
     * @return Env
     */
    public function removeDuplicate()
    {
        // get duplicate data
        $enableds = $this->getEnableds();
        foreach ($this->lines as $lkey => $line) {
            if (substr($line, 0, 1) == '#') {
                foreach ($enableds as $key => $value) {
                    if (strpos($line, "{$key}=")) {
                        unset($this->lines[$lkey]);
                    }
                }
            }
        }

        return $this;
    }

    /**
     *  Get all enabled
     *
     * @return Env
     */
    public function getEnableds(): array
    {
        $data = [];
        foreach ($this->data as $key => $value) {

            if ($value['enabled'] == false) {
                continue;
            }

            if ($value['key'] == null || $value['key'] == '') {
                continue;
            }
            $data[$value['key']] = $value['value'];
        }
        return $data;
    }

    /**
     *  Get all enabled
     *
     * @return Env
     */
    public function getDisableds(): array
    {
        $data = [];
        foreach ($this->data as $key => $value) {

            if ($value['enabled'] == true) {
                continue;
            }

            if ($value['type'] == 'line') {
                continue;
            }

            if ($value['key'] == null || $value['key'] == '') {
                continue;
            }
            $data[$value['key']] = $value['value'];
        }
        return $data;
    }

    /**
     * Get enable and disabled .env
     * @return array
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Get Env as plan text
     * @return string
     */
    public function getContent(): String
    {
        return implode("\r\n", $this->lines);
    }

    /**
     * Backup .env file
     * @return void
     */
    public function backup(): void
    {
        file_put_contents(
            laravel_path('/storage/app/env-backup/' . date("Y-m-d-His") . '.env'),
            $this->getContent()
        );
    }

    /**
     * Save .env files
     * @return boolean
     */
    public function save()
    {
        // formate .env file content
        $pattern = '/\n{3,}/';  // Matches 3 or more consecutive newlines
        $replacement = "\n\n";  // Replace with 2 consecutive newlines
        $content = preg_replace($pattern, $replacement, $this->getContent());
        // $content = preg_replace($pattern, $replacement, $content);

        if(!file_put_contents(laravel_path('.env'), $content)){
            throw new Exception('Unable to save file: ~/.env');
        }

        return true;
    }
}


/**
 * Get or set .env
 *
 * @param string $key
 * @param mixed $default
 *
 * @return mixed;
 */
function _env($keys, $defaule = "")  {

    $env = new Env();

    if(is_string($keys)){
        return $env->get($keys, $defaule);
    }

    //update env
    if(is_array($keys)){

        if(empty($keys)){
            return false;
        }

        $env->update($keys);
    }

    return true;
}

/**
 * Ensure .env file to run this applicaion
 * 
 */
if( !file_exists($target = laravel_path('.env')) ){

    $source = laravel_path($name = '.env.example');

    if(!file_exists($source)){
        ob_end_clean();
        exit("Env File not found. <code>~/{$name}</code>");
    }

    file_put_contents($target, file_get_contents($source));
}
