<?php
namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Plugin{

    /**
     * The Plugin's attributes.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * The Plugin name.
     *
     * @var
     */
    protected $plugin_name;

    /**
     * The pluginss data.
     *
     * @var
     */
    protected array $plugins = [];
    /**
     *
     * @var Singleton
     */
    public static $instance;

    /**
     * The constructor.
     */
    public function __construct( $plugin_name = null)
    {
        $this->plugin_name = $plugin_name;

        if(empty($this->plugins)){
            $this->plugins = $this->optimize(false);
        }
    }

    /**
     * get base cache_path
     * @return string
     */
    public function cache_path():string
    {
        return base_path('bootstrap/cache/plugins.php');
    }

    /**
     *  Get cache data all of plugins
     * @return array
     */
    public function getCache():Array
    {
        return $this->plugins;
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return Plugin
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * return Plugin array
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $cache = $this->optimize(false);
        $collection = collect();

        foreach ($this->filesToScan() as $file) {
            $composer = $this->packageFromFile($file);
            $plugin_name = $composer['name'];

            $data['name'] = $composer['name'];
            $data['description'] = $composer['description']?? "";
            $data['type'] = $composer['type']?? "";
            $data['author_name'] = $composer['authors'][0]['name']?? "";
            $data['author_email'] = $composer['authors'][0]['email']?? "";
            $data['homepage'] = $composer['homepage']?? "";
            $data['version'] = $composer['version']?? "0.0.1";
            /**
             * get data form cache
             */
            if(isset($cache['plugins'][$plugin_name]['enable'])){
                $data['enable'] = $cache['plugins'][$plugin_name]['enable'];
            }
            if(isset($cache['plugins'][$plugin_name]['path'])){
                $data['path'] = $cache['plugins'][$plugin_name]['path'];
            }

            // create new instance
            self::$instance = new self( $plugin_name );
            self::$instance->attributes = $data;
            $collection->push(self::$instance);
        }

        return $collection->all();
    }

    /**
     * return Plugin array
     * @return \Illuminate\Support\Collection
     */
    public function forceAndGet()
    {
        $cache = $this->optimize(true);
        $collection = collect();

        foreach ($this->filesToScan() as $file) {
            $composer = $this->packageFromFile($file);
            $plugin_name = $composer['name'];

            $data['name'] = $composer['name'];
            $data['description'] = $composer['description']?? "";
            $data['type'] = $composer['type']?? "";
            $data['author_name'] = $composer['authors'][0]['name']?? "";
            $data['author_email'] = $composer['authors'][0]['email']?? "";
            $data['homepage'] = $composer['homepage']?? "";
            $data['version'] = $composer['version']?? "0.0.1";
            /**
             * get data form cache
             */
            if(isset($cache['plugins'][$plugin_name]['enable'])){
                $data['enable'] = $cache['plugins'][$plugin_name]['enable'];
            }
            if(isset($cache['plugins'][$plugin_name]['path'])){
                $data['path'] = $cache['plugins'][$plugin_name]['path'];
            }

            // create new instance
            self::$instance = new self( $plugin_name );
            self::$instance->attributes = $data;
            $collection->push(self::$instance);
        }

        return $collection->all();
    }

    public function exists($name= null)
    {
        if($name == null){
            $name = $this->current;
        }

        if($name == null){
            return false;
        }

        if(File::isDirectory(plugin_path($name))){
            return true;
        }
        return false;
    }

    /**
     * scan all Plugin
     * @param boolean $force
     * @return array
     */
    public function optimize($force = true)
    {
        $packages['providers'] = [];
        $packages['aliases'] = [];

        if(File::exists($this->cache_path()) && $force == false){
            return include $this->cache_path();
        }

        foreach ($this->filesToScan() as $file) {
            // default attrubute
            $content = $this->packageFromFile($file);

            // check install or not
            $ignoreStatus = false;
            foreach ($ignores = $this->plugins as $key => $status) {
                if($key == $content['name']){
                    unset($ignores[$key]);
                    if($status == false){
                        $ignoreStatus = true;
                    }
                }
            }

            $laravel = $content['extra']['laravel'];

            if(isset($laravel['providers']) == true && !$ignoreStatus){

                foreach ($laravel['providers'] as $provider) {
                    // init provider
                    $packages['providers'][] = $provider;
                }
            }

            if(isset($laravel['aliases']) == true && !$ignoreStatus){
                $packages['aliases'] = $laravel['aliases'];
            }

            // directory name of the package
            $packages['plugins'][$content['name']]['path']   = basename(dirname($file));
            $packages['plugins'][$content['name']]['enable'] = !$ignoreStatus;
        }

        File::replace(
            $this->cache_path(),
            '<?php return '.var_export($packages, true).';'.PHP_EOL
        );

        // minimun execute time
        if(!app()->runningInConsole()){
           // header("Refresh:0");
        }

        return $packages;
    }

    /**
     * Wikimedia Composer Merge Plugin composer.json paths
     *
     * @return array
     */
    public function filesToScan()
    {
        /**
         * check root composer.json path
         */
        if ( !File::exists( base_path('composer.json') ) ) {
            return [];
        }

        /**
         * read composer.json
         * @return array $composer
         */
        $composer = json_decode(File::get(
            base_path('composer.json')
        ), true);

        /**
         * scan include composer paths
         */
        $paths = [];
        if(isset($composer['extra']['merge-plugin']['include'])==true){
            foreach ($composer['extra']['merge-plugin']['include'] as $include) {

                if(DIRECTORY_SEPARATOR != '/'){
                    $include = str_replace('/', DIRECTORY_SEPARATOR, $include);
                }

                foreach (glob(base_path($include)) as $filename) {

                    $baseStrlen = strlen(base_path(DIRECTORY_SEPARATOR));

                    if(substr($filename, $baseStrlen, 7) =='plugins'){
                        $paths[]= $filename;
                    }

                }
            }
        }

        return $paths;
    }

    /**
     * packages composer.json path
     *
     * @param string $file composer.json path
     *
     * @return array
     */
    public function packageFromFile($file)
    {
        $data['providers'] = [];

        if ( !File::exists($file)) {
            return $data;
        }

        return json_decode(File::get( $file), true);
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        $name = explode('/', $this->attributes['name'] );
        return end($name);
    }


    /**
     * Get pluings name
     */
    public function getNames()
    {
        $cache = $this->optimize(false);
        $data =[];
        foreach ($this->filesToScan() as $file) {
            $composer = $this->packageFromFile($file);
            $data[] = $composer['name'];
        }
        return $data;
    }

    /**
     * Determines if the specified Plugin is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enable;
    }

    /**
     * Determines if the specified Plugin is disabled.
     *
     * @return bool
     */
    public function isDisabled()
    {
        return !$this->enable;
    }

    /**
     * Determines if the specified Plugin is disabled.
     *
     * @return bool
     */
    public function option()
    {
        // return Option::where('plugin_name', $this->name )->get();
    }

    /**
     * Determines if the specified Plugin is disabled.
     *
     * @return bool
     */
    public function hasOption()
    {
        $courier = $this->getName();
        if (view()->exists("{$courier}::option")){
            return true;
        }
        return false;
    }

    /**
     * get attribute
     * @param attribute $name
     * @return string
     */
    public function __get ( $name ){

        if(isset($this->attributes[$name]) == true){
            return $this->attributes[$name];
        }
        return "";
    }

}

?>
