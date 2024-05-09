<?php

namespace App\Console\Commands;

use App\Facades\Env;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DemoInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo Install Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(env('APP_DEMO') != true){
            // install before
            Env::update([
                'APP_DEMO'          => 'true',
            ]);

            $this->info("Run this command again");
            exit();
        }
        // install before
        Env::update([
            'APP_ENV'           => 'local',
            'APP_DEMO'          => 'true',
            'APP_ENV'           => 'local',
            'APP_DEBUG'         => 'false',
            "SESSION_DRIVER"    => "database",
            'APP_INSTALLED'     => "true",
        ]);

        Artisan::call('migrate:fresh', ['--force' => true]);

        //
        Artisan::call('db:seed', [
            '--force' => true,
            '--class' =>  "\\Database\\Seeders\\DemoVersionSeeder"
        ]);

        Artisan::call('cms:assets', [
            '--force' => true,
        ]);

        Artisan::call('storage:link', [
            '--force' => true
        ]);

        $this->info("Wokoya Demo installation complete.");
        return 0;
    }
}
