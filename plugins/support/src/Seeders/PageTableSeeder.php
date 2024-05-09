<?php

namespace Wokoya\Support\Seeders;

use App\Facades\Seo;
use App\Models\Page;
use App\Models\ThemeOption;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageTableSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // pages
        foreach ($this->pageData() as $data) {

            // create page
            $page = Page::firstOrNew([
                'slug'     => $data['slug'],
            ]);

            if (!$page->exists) {

                $seo = Seo::create([
                    'id' => Str::uuid(),
                    // Primary Meta Tags
                    'title' => $data['title'],
                    'description' => $data['summary'],
                    'keywords' => '',
                    // Open Graph / Facebook
                    'og_type' => 'article',
                    'og_title' => $data['title'],
                    'og_description' => $data['summary'],
                    'og_image' => asset('storage/2021/11/seo_image.png'),
                    // Twitter
                    'twitter_card' => 'summary',
                    'twitter_title' => $data['title'],
                    'twitter_description' => $data['summary'],
                    'twitter_image' => asset('storage/2021/11/seo_image.png'),
                ]);

                $page->fill([
                    'seo_id'    => (string)$seo->getId(),
                    'locale'    => app()->getLocale(),
                    'title'     => $data['title'],
                    'slug'      => $data['slug'],
                    // 'user_id'   => null,
                    'layout'    => $data['layout'],
                    'summary'   => $data['summary'],
                    'content'   => $data['content'],
                    'thumbnail' => asset('storage/2021/11/seo_image.png'),

                ])->save();
            }

        }
    }


    public function pageData()
    {
        $data = [
            [
                'title' => 'Home 1 | Wokoya Laravel CMS',
                'slug' => '',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.home',
                'content' => '',
            ],
            [
                'title' => 'Blog | Wokoya Laravel CMS',
                'slug' => 'blog',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.blog',
                'content' => '',
            ],
        ];

        if (env('APP_DEMO')) {
            $data[] = [
                'title' => 'Home 2 | Wokoya Laravel CMS',
                'slug' => 'home-2',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.home-2',
                'content' => '',
            ];
            $data[] = [
                'title' => 'Home 3 | Wokoya Laravel CMS',
                'slug' => 'home-3',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.home-3',
                'content' => '',
            ];

            $data[] = [
                'title' => 'Home 3 | Wokoya Laravel CMS',
                'slug' => 'home-3',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.home-3',
                'content' => '',
            ];


            $data[] = [
                'title' => 'Privacy Policy | Wokoya Laravel CMS',
                'slug' => 'privacy-and-policy',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.page',
                'content' => file_get_contents(__DIR__. '/data/page_privacy-and-policy.txt'),
            ];
            $data[] = [
                'title' => 'Trams and condition | Wokoya Laravel CMS',
                'slug' => 'trams-and-condition',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.page',
                  'content' => file_get_contents(__DIR__. '/data/page_privacy-and-policy.txt'),
            ];
            $data[] = [
                'title' => 'Service | Wokoya Laravel CMS',
                'slug' => 'service',
                'summary' => 'Wokoya Laravel CMS',
                'layout' => 'theme::layouts.page',
                'content' => file_get_contents(__DIR__. '/data/page_privacy-and-policy.txt'),
            ];


        }

        return $data;
    }
}
