<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DemoVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(OptionsTableSeeder::class);
        $this->call(AuthorizationSeeder::class);
        $this->call(MenusTableSeeder::class);
        // theme support
        $this->call(\Wokoya\Support\Seeders\DemoVersionSeeder::class);


    }
}
