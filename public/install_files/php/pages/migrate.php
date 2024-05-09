<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

// guard or back to previus
if(!permission('migrate') ){
    redirectTo('information');
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

    permission('seed', true);

    // Use the Artisan command to run migrations for each path
    \Illuminate\Support\Facades\Artisan::call('migrate', [
        '--force' => true
    ]);

    // try {

    // } catch (Throwable $ex) {
    //     permission('fails', true);
    //     redirectTo('fails');
    //     exit();
    // }

    json_response("migrate successfull");
    exit();
}


?>

<div class="card-body">

    <div class="row mb-3" id="db_error" style="display: none;">  </div>

    <!-- <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Note</h4>
        <p>Install large application without any error. Please wait some moment. Its take sevaral time. </p>
    </div> -->

    <p>
        Migrating database schema for the CMS.
    </p>

    <form id="migrationForm" action="<?= url() ?>" method="post" style="display: none;"></form>
</div>

<div class="card-footer">
    <button type="button" id="migrateSubmitBtn" class="btn btn-next">Migrate</button>
</div>

