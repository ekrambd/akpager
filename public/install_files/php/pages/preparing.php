<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

sleep(1);
// guard or back to previus
if(!permission('preparing') ){
    redirectTo('information');
}


$db = new DB();
$cache_file = laravel_path('storage/framework/views/migration_seeder_files.php');

// database connecton fails
if(! $db->hasDBconnection()){
    redirectTo('database');
}

// handle form
if(isPost()){

    ob_end_clean();
    $config = [];

    if(!file_exists($cache_file)){
        redirectTo('information');
    }
    $config = require $cache_file;

    if(array_key_exists('handler',  $_GET)){

        if($_GET['handler'] == 'migrate'){

            $migrateFiles = [];
            if(!empty($config['migration'])){
                $migrateFiles = $config['migration'][0];
                unset($config['migration'][0]);
                $config['migration']= array_values($config['migration']);
            }

            if(!empty($migrateFiles)){
                bootOnFramework();

                try {
                    // Use the Artisan command to run migrations for each path
                    \Illuminate\Support\Facades\Artisan::call('migrate', [
                        '--path' => $migrateFiles,
                        '--realpath' => true
                    ]);
                } catch (Throwable $ex) {
                    //throw $th;
                    // var_dump($ex);
                }

            }

            $manifestData  =  "<?php\n return ".var_export($config, true).";";

            file_put_contents($cache_file, $manifestData );

            json_response('Information update success', 200, [
                'migration_count' => count($config['migration']),
                'seeder_count' => count($config['seeder']),
            ]);
            exit();
        }
        else if($_GET['handler'] == 'seeding'){

            $db = new DB();
            // check migration table
            if(empty($db->getAllTables()) ){
                redirectTo('information');
            }

            $className = null;
            if(!empty($config['seeder'])){
                $className = $config['seeder'][0];
                unset($config['seeder'][0]);
                $config['seeder']= array_values($config['seeder']);
            }

            permission('create-user', true);
            bootOnFramework();
            if(class_exists( $className )){
                // Use the Artisan command to run migrations for each path
                \Illuminate\Support\Facades\Artisan::call('db:seed', [
                    '--class' => $className,
                ]);
            }

            $manifestData  =  "<?php\n return ".var_export($config, true).";";

            file_put_contents($cache_file, $manifestData );

            json_response('Information update success', 200, [
                'migration_count' => count($config['migration']),
                'seeder_count' => count($config['seeder']),
            ]);
        }
    }

    json_response("fail:", 500);
    exit();
}


?>

<div class="card-body">

    <div class="row mb-3" id="db_error" style="display: none;">  </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Note</h4>
        <p>Install large application without any error. Please wait some moment. Its take sevaral time. </p>
    </div>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>Migration</div>
            <span class="badge bg-primary rounded-pill" id="migrateCount">...</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>Seed</div>
            <span class="badge bg-primary rounded-pill" id="seedCounter">...</span>
        </li>

    </ul>

    <form id="migrationForm" action="<?= url() ?>?handler=migrate" method="post" style="display: none;"></form>
    <form id="seedingForm" action="<?= url() ?>?handler=seeding" method="post" style="display: none;"></form>

</div>

<div class="card-footer">
    <button type="button" id="permissionsStartBtn" class="btn btn-next">Next</button>
</div>

