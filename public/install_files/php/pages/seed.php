<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

// guard or back to previus
if(!permission('seed') ){
    redirectTo('migrate');
}

$db = new DB();

// database connecton fails
if(! $db->hasDBconnection()){
    redirectTo('database');
}

// handle form
if(isPost()){

    ob_end_clean();
    bootOnFramework();
    \Illuminate\Support\Facades\Cache::flush();

    permission('create-user', true);
    // Use the Artisan command to run migrations for each path
    \Illuminate\Support\Facades\Artisan::call('db:seed', [
        '--force' => true
    ]);

    json_response("Seed successfull");
    exit();
}


?>

<div class="card-body">

    <div class="row mb-3" id="db_error" style="display: none;">  </div>

    <p>Seeding initial data into the database.</p>

    <form id="seedingForm" action="<?= url() ?>" method="post" style="display: none;"></form>

</div>

<div class="card-footer">
    <button type="button" id="seedingBtn" class="btn btn-next">Seeding</button>
</div>

