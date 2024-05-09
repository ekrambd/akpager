<?php

namespace Wokoya\Support\Seeders;

use App\Models\ThemeOption;
use Illuminate\Database\Seeder;

class ThemeOptionTableSeeder extends Seeder
{

    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
        // set home and blog page
        foreach ($this->data() as $key => $value) {
            ThemeOption::updateOrCreate([
                "theme_name"    => env('STANDARD_THEME'),
                "key"           => $key,
                "lang"          => app()->currentLocale(),
            ],[
                "value"         => $value,
            ]);
        }
    }

    public function data()
    {
        $theme_name = env('STANDARD_THEME');
        $data = [
            // image
            "site_logo" => asset("themes/{$theme_name}/assets/images/logos/logo.png"),
            "site_favicon" => asset("themes/{$theme_name}/assets/images/logos/favicon.png"),

            //site
            "site_shortname" => "Akpager",
            "site_title" => "Multipurpose Landing page Laravel CMS",
            "title_separate" => '-',
            "site_description" => "Laravel CMS",
            "site_shortname_is_after" => 'on',

            // seo
            "seo_title" => "Multipurpose Landing page Laravel CMS",
            "seo_description" => "Laravel CMS",
            "seo_ogimage" => asset("themes/{$theme_name}/assets/img/seo_image.png"),

            //socials
            "social_facebook" => "#",
            "social_twitter" => "#",
            "social_youtube" => "#",

            // google
            "google_map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.9884675458907!2d55.47781281501099!3d25.270973383861868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5fa631c9b3eb%3A0x8e1767fbdbb6f44d!2sMaliha%20Rd%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sbd!4v1631169609660!5m2!1sen!2sbd",
            "google_analytic" => '',
            "disqus_shortname" => "",
        ];

        return $data;
    }

}
