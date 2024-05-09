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

    public function site_menu()
    {
        // create admin menu
        $menu = Menu::firstOrNew([
            'name'     => 'site',
        ]);
        if (!$menu->exists) {
            $menu->save();
        }


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Home'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-home',
                'parent_id'  => null,
                'order'      => 1,
                'url'        => '/#home',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('About'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-contact-add',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#about',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Service'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-file-document',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#service',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Works'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-briefcase-1',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#work',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Review'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-quote-left',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#feed',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Blog'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-blogger',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#blog',
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('Hello'),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'icofont-envelope',
                'parent_id'  => null,
                'order'      => 2,
                'url'        => '/#contact',
            ])->save();
        }

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
