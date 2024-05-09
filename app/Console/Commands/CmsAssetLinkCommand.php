<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Support\Facades\File;

class CmsAssetLinkCommand extends StorageLinkCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:assets
                            {--relative : Create the symbolic link using relative paths}
                            {--force : Recreate existing symbolic links}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Themes and plugins assets symbolic links configured for the application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if(file_exists($path = public_path('storage'))){
            //File::deleteDirectory($path);
        }

        if(is_dir($path = public_path('themes'))){
            File::deleteDirectories($path);
        }

        if(is_dir($path = public_path('plugins'))){
            File::deleteDirectories($path);
        }

        parent::handle();
    }


    /**
     * Get the symbolic links that are configured for the application.
     *
     * @return array
     */
    protected function links()
    {
        // storage link
        $links =  [];

        // admin assets
        File::ensureDirectoryExists(base_path('themes/admin'));
        $key = public_path('themes'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'assets');
        File::ensureDirectoryExists(dirname($key));
        $links[ $key] = resource_path('assets');

        //themes
        foreach (glob(theme_path('*'.DIRECTORY_SEPARATOR.'assets')) as $path) {

            $theme_name = basename(dirname($path));
            if( 'admin' == $theme_name){
                continue;
            }

            //create directories
            $rel = "themes".DIRECTORY_SEPARATOR. $theme_name;
            File::ensureDirectoryExists(public_path($rel));

            // append links
            $key = public_path($rel .DIRECTORY_SEPARATOR."assets" );
            $links[ $key ] = $path;
        }

        // plugins
        foreach (glob(plugin_path('*'.DIRECTORY_SEPARATOR.'assets')) as $path) {
           //create directories
            $plugin_name = basename(dirname($path));
            $rel = 'plugins'. DIRECTORY_SEPARATOR . $plugin_name;

            File::ensureDirectoryExists(public_path($rel));

            // append links
            $key = public_path($rel .DIRECTORY_SEPARATOR.'assets' );
            $links[ $key ] = $path;
        }

        // remove old link
        foreach ($links as $link => $target) {

            if (file_exists($link)) {
                @unlink($link);
            }
        }

        return $links;
    }

}
