<?php

namespace Wokoya\Support\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->admin_menu();
        $this->site_menu();
    }

    public function addItem($attributes = []) {
        $item = MenuItem::firstOrNew([
            'menu_id' => $attributes['menu_id'],
            'title'   => __($attributes['title']),
            'parent_id'  => $attributes['parent_id'],
        ]);
        if (!$item->exists) {
            $item->fill([
                'target'     => '_self',
                'icon_class' => '',
                'order'      => $attributes['order'],
                'url'        => $attributes['url'],
            ])->save();
        }

        return $item->id;
    }

    public function site_menu()
    {
        // create admin menu
        $menu = Menu::firstOrNew([
            'name'     => 'site',
        ]);
        if (!$menu->exists) {
            $menu->save();
        }

        $homePageId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Home',
            'parent_id'  => null,
            'order'      => 1,
            'url'        => '#',
        ]);

        $multiPageId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'MultiPage',
            'parent_id'  => $homePageId,
            'order'      => 1,
            'url'        => '#',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Business',
            'parent_id'  => $multiPageId,
            'order'      => 1,
            'url'        => '/',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Lead Capture',
            'parent_id'  => $multiPageId,
            'order'      => 2,
            'url'        => '/index2',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Software Landing',
            'parent_id'  => $multiPageId,
            'order'      => 3,
            'url'        => '/index3',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'E-learning',
            'parent_id'  => $multiPageId,
            'order'      => 4,
            'url'        => '/index4',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Saas Landing',
            'parent_id'  => $multiPageId,
            'order'      => 5,
            'url'        => '/index5',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'AI Software',
            'parent_id'  => $multiPageId,
            'order'      => 6,
            'url'        => '/index6',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Website Builder',
            'parent_id'  => $multiPageId,
            'order'      => 7,
            'url'        => '/index7',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Fintech',
            'parent_id'  => $multiPageId,
            'order'      => 8,
            'url'        => '/index8',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Chatbot',
            'parent_id'  => $multiPageId,
            'order'      => 9,
            'url'        => '/index9',
        ]);

        $onePageId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'OnePage',
            'parent_id'  => $homePageId,
            'order'      => 1,
            'url'        => '#',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Business',
            'parent_id'  => $onePageId,
            'order'      => 1,
            'url'        => '/',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Lead Capture',
            'parent_id'  => $onePageId,
            'order'      => 2,
            'url'        => '/index2',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Software Landing',
            'parent_id'  => $onePageId,
            'order'      => 3,
            'url'        => '/index3',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'E-learning',
            'parent_id'  => $onePageId,
            'order'      => 4,
            'url'        => '/index4',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Saas Landing',
            'parent_id'  => $onePageId,
            'order'      => 5,
            'url'        => '/index5',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'AI Software',
            'parent_id'  => $onePageId,
            'order'      => 6,
            'url'        => '/index6',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Website Builder',
            'parent_id'  => $onePageId,
            'order'      => 7,
            'url'        => '/index7',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Fintech',
            'parent_id'  => $onePageId,
            'order'      => 8,
            'url'        => '/index8',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Chatbot',
            'parent_id'  => $onePageId,
            'order'      => 9,
            'url'        => '/index9',
        ]);

        $pageId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Pages',
            'parent_id'  => null,
            'order'      => 2,
            'url'        => '#',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'About',
            'parent_id'  => $pageId,
            'order'      => 1,
            'url'        => '/about',
        ]);

        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Services',
            'parent_id'  => null,
            'order'      => 3,
            'url'        => '/services',
        ]);

        $shopId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Shop',
            'parent_id'  => null,
            'order'      => 4,
            'url'        => '#',
        ]);

        $projectId = $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Projects',
            'parent_id'  => null,
            'order'      => 4,
            'url'        => '#',
        ]);

        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Project Grid',
            'parent_id'  => $projectId,
            'order'      => 1,
            'url'        => '/projects',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Project List',
            'parent_id'  => $projectId,
            'order'      => 1,
            'url'        => '/project-list',
        ]);
        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Project Masonry',
            'parent_id'  => $projectId,
            'order'      => 1,
            'url'        => '/project-masonry',
        ]);

        $this->addItem([
            'menu_id' => $menu->id,
            'title'   => 'Blog',
            'parent_id'  => null,
            'order'      => 5,
            'url'        => '/blog',
        ]);

    }

    public function admin_menu()
    {
        // create admin menu
        $menu = Menu::firstOrNew([
            'name'     => 'admin',
        ]);
        if (!$menu->exists) {
            $menu->save();
        }

        $blogItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Blog'),
        ]);
        if (!$blogItem->exists) {
            $blogItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-cast',
                'parent_id'  => null,
                'order'      => 9,
                'url'        => '#',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Posts'),
            'url'     => route('posts.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => '',
                'parent_id'  => $blogItem->id,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Categories'),
            'url'     => route('categories.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => '',
                'parent_id'  => $blogItem->id,
                'order'      => 2,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Contacts'),
            'url'     => route('admin.contacts.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-at-sign',
                'parent_id'  => null,
                'order'      => 12,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('faq'),
            'url'     => route('admin.faqs.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-aperture',
                'parent_id'  => null,
                'order'      => 13,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Portfolios'),
            'url'     => route('admin.portfolios.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-command',
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Packages'),
            'url'     => route('admin.prices.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-dollar-sign',
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Qualification'),
            'url'     => route('admin.qualifications.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-flag',
                'parent_id'  => null,
                'order'      => 16,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Services'),
            'url'     => route('admin.services.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-git-commit',
                'parent_id'  => null,
                'order'      => 17,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Skills'),
            'url'     => route('admin.skills.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-sunrise',
                'parent_id'  => null,
                'order'      => 18,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Testimonials'),
            'url'     => route('admin.testimonials.index'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'feather-square',
                'parent_id'  => null,
                'order'      => 19,
            ])->save();
        }


    }
}
