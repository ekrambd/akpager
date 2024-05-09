<?php

namespace Plugins\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Plugins\Blog\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $key => $value) {
            $category = Category::firstOrNew([
                'name'   => __($value),
            ]);
            if (!$category->exists) {
                $category->save();
            }
        }
    }

    private function data() {
        return [
            'Uncategorized',
            'Marketing',
            'SEO optimization',
            'Content Marketing',
            'Keywords Research',
            'Technical Adult'
        ];
    }
}
