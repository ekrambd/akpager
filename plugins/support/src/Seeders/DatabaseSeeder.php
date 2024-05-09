<?php

namespace Wokoya\Support\Seeders;

use App\Facades\Env;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(\Wokoya\Support\Seeders\MenuTableSeeder::class);

        // theme options
        $this->options();

        //AuthorizationSeeder
        $this->call(\Wokoya\Support\Seeders\AuthorizationSeeder::class);

        //PageTableSeeder
        $this->call(\Wokoya\Support\Seeders\PageTableSeeder::class);

        //ThemeOptionTableSeeder
        $this->call(\Wokoya\Support\Seeders\ThemeOptionTableSeeder::class);
    }


    public function options()
    {
        option([
            'title_separate' => '',
            'site_description' => '',
            'seo_title' => '',
            'seo_description' => '',
            'seo_ogimage' => '',
            'site_address' => '',
            'site_email' => ' chat@example.com',
            'site_phone' => '+123 456 7890',
            'site_copyright' => 'Copyright @ wokoya',
            // pages
            'site_herobg' => asset('themes/akpager/assets/img/header-bg.jpg'),
            'site_logo' => asset('themes/akpager/assets/images/logos/logo.png'),
            'site_favicon' => '',
            'about_avatar' => asset('themes/akpager/assets/img/about-me.png'),

            'social_facebook' => '',
            'social_twitter' => '',
            'social_youtube' => '',
            'page_home' => 'home',
            'page_blog' => 'blog',
        ]);
    }
}
