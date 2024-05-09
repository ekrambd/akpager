<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Option{

    /**
     * @var $options
     */
    private array  $options= [];

    /**
     * Get all item
     *
     * @return array
     */
    public function all() {

        if(!empty($this->options)){
            return $this->options;
        }

        $this->options = Cache::rememberForever('-__OPTIONS__-', function () {

            $options = array(
                '__init__' => 'true',
            );

            foreach ($this->table()->select('key', 'value')->get() as $option ) {
                $key = $option->key;
                $options[$key] = $option->value;
            }

            return $options;
        });

        return $this->options;
    }

    /**
     * Determine if the given option value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function exists($key)
    {
        return array_key_exists($key, $this->all());
    }

    /**
     * Get the specified option value.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $options = $this->all();

        if (array_key_exists($key, $options)) {
            return urldecode($options[$key]);
        }

        return $default;
    }

    /**
     * Set a given option value.
     *
     * @param  array|string  $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        $insertData = [];

        foreach ($keys as $key => $value) {

            if($this->table()->where('key', $key)->exists()){
                $this->table()->where('key', $key)->update([
                    'value' => $value,
                ]);
            }else{
                $insertData[] = array(
                    'key' => $key,
                    'value' => $value,
                );
            }

            $this->options[$key] = $value;
        }

        if(!empty($insertData)){
            $this->table()->insert($insertData);
        }

        Cache::flush();

        return true;
    }

    /**
     * Remove/delete the specified option value.
     *
     * @param  string  $key
     * @return bool
     */
    public function remove($key)
    {
        $options = $this->all();
        Cache::flush();

        if (array_key_exists($key, $options)) {
            unset( $this->options[$key] );

            $this->table()->where('key', $key)->delete();
            return true;
        }

        return false;
    }

    /**
     *
     */
    private function table() {

        return DB::table('options');
    }
}
