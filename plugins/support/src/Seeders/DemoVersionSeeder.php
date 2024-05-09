<?php

namespace Wokoya\Support\Seeders;

use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\Wokoya\Support\Seeders\MenuTableSeeder::class);
        // // create users
        \App\Models\User::factory(100)->create();
        // //create demo admin
        $this->createUser();
        // // //create activitys
        $this->call(\Database\Seeders\ActivityTableSeeder::class);

        //plugins seeders
        $this->call(\Plugins\Blog\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Contact\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Faq\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Portfolio\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Price\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Qualification\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Service\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Skill\Database\Seeders\DatabaseSeeder::class);
        $this->call(\Plugins\Testimonial\Database\Seeders\DatabaseSeeder::class);

        //PageTableSeeder
        $this->call(\Wokoya\Support\Seeders\PageTableSeeder::class);

        // theme options
        $this->options();

        //AuthorizationSeeder
        $this->call(\Wokoya\Support\Seeders\AuthorizationSeeder::class);

        //ThemeOptionTableSeeder
        $this->call(\Wokoya\Support\Seeders\ThemeOptionTableSeeder::class);
    }

    /**
     * Create Demo user
     *
     * username: admin
     * email: admin@admin.com
     * password: password
     */
    public function createUser()
    {
        $role = Role::where('name', 'admin')->first();

        return User::firstOrCreate(
            array(
                "username" => "admin",
                "email" => "admin@admin.com",
            ),
            array(
                'id' => Str::uuid(),
                "username" => "admin",
                "email" => "admin@admin.com",
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                "email_verified_at" => now(),
                'role_id' => $role->id,
                'avatar' => asset('storage/2021/11/avatar.png')
            )
        );
    }

    public function options()
    {

        $page = Page::where('slug', '')->first();
        $page_home_id = $page->id;

        $page = Page::where('slug', 'blog')->first();
        $page_blog_id = $page->id;

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
            'site_herobg' => asset('themes/wokoya/assets/img/header-bg.jpg'),
            'site_logo' => asset('themes/wokoya/assets/img/profile-avatar.jpg'),
            'site_favicon' => '',
            'about_avatar' => asset('themes/wokoya/assets/img/about-me.png'),

            'social_facebook' => '',
            'social_twitter' => '',
            'social_youtube' => '',
            'page_home_id' => $page_home_id,
            'page_blog_id' => $page_blog_id,
        ]);
    }
}
