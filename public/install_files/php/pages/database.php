<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}
// guard or back to previus
if(!permission('database')){
    redirectTo('requirements');
}

$db = new DB();

// handle form
if(isPost()){


    $host = _post('DB_HOST');
    $port = _post('DB_PORT');
    $database = _post('DB_DATABASE');
    $username = _post('DB_USERNAME');
    $password = _post('DB_PASSWORD', '');

    if (
        str_contains($host, '#') ||
        str_contains($port, '#') ||
        str_contains($database, '#') ||
        str_contains($username, '#') ||
        str_contains($password, '#')
    ) {
        return json_response('Please change. [#] is not valied .env value', 500);
    }

    _env([
        'DB_HOST' => $host,
        'DB_PORT' => $port,
        'DB_DATABASE' =>  $database,
        'DB_USERNAME' => $username,
        'DB_PASSWORD' => $password,
    ]);
    sleep(1);

    if($db->hasDBconnection()){
        permission('information', true);
        json_response('Database connection success');
        exit();
    }else {
        json_response('Connection failed: ', 500);
        exit();
    }

    exit();
}


?>
<div class="card-body">
    <!-- <?php if($db->hasDBconnection()) : ?>
        <div class="alert  alert-info" role="alert">
            <strong>Node:</strong> We Found database connection
        </div>
    <?php endif; ?> -->
    <form id="databaseForm" method="post" action="<?= url(); ?>">

        <div class="row mb-3" id="db_error" style="display: none;">  </div>

        <div class="row mb-3">
            <p>Below you should enter your database connection details. If you're not sure about these, contact your host.</p>
        </div>
        <div class="row mb-3">
            <label for="database_connection" class="col-sm-4 col-form-label">
            Database Connection
            </label>

            <div class="col-sm-8">
                <select class="form-select" disabled>
                    <option value="mysql">mysql</option>
                </select>
            </div>
            <!-- <div class="col-sm-8  offset-sm-4">
                Please specify the database driver type for this connection.
            </div> -->
        </div>

        <div class="row mb-3">
            <label for="database_hostname" class="col-sm-4 col-form-label  ">
            Database Host
            </label>
            <div class="col-sm-8">
                <input name="DB_HOST" value="<?= _env('DB_HOST', '127.0.0.1') ?>" class="form-control" id="database_hostname" placeholder="Database Host"  required>
            </div>
            <div class="col-sm-8 offset-sm-4">
                You should be able to get this info from your web host, if localhost doesn't work.
            </div>
        </div>

        <div class="row mb-3">
            <label for="database_port" class="col-sm-4 col-form-label">
                Database Port
            </label>
            <div class="col-sm-8">
                <input name="DB_PORT" value="<?=  _env('DB_PORT', '3306' ) ?>" class="form-control" id="database_port" placeholder="'Database Port" required>
            </div>
            <div class="col-sm-8 offset-sm-4">
                Your database port name.
            </div>
        </div>

        <div class="row mb-3">
            <label for="database_name" class="col-sm-4 col-form-label">
            Database Name
            </label>
            <div class="col-sm-8">
                <input name="DB_DATABASE" value="<?= _env('DB_DATABASE', '') ?>" class="form-control" id="database_name"   placeholder="Database Name" required>
            </div>
            <div class="col-sm-8 offset-sm-4">
            The name of the database you want to use with Laravel app.
            </div>
        </div>

        <div class="row mb-3">
            <label for="database_username" class="col-sm-4 col-form-label">
            Database User Name
            </label>
            <div class="col-sm-8">
                <input name="DB_USERNAME" value="<?= _env('DB_USERNAME', ''); ?>" class="form-control" id="database_username" placeholder="Database User Name" required>
            </div>
            <div class="col-sm-8 offset-sm-4">
            Your database username.
            </div>
        </div>

        <div class="row mb-3">
            <label for="database_password" class="col-sm-4 col-form-label">
            Database Password
            </label>
            <div class="col-sm-8">
                <input name="DB_PASSWORD" value="<?= _env('DB_PASSWORD', '') ?>" class="form-control" id="database_password" placeholder="Database Password">
            </div>
            <div class="col-sm-8 offset-sm-4">
            Your database password.
            </div>
        </div>
    </form>

</div>
<div class="card-footer">
    <button id="databaseFormBtn" type="button" class="btn btn-next">Next</button>
</div>