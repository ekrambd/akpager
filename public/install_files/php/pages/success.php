<?php
defined('LARAVEL_START') or die("Direct action not allowd");

// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

// // guard or back to previus
if(!permission('success') ){
    redirectTo('wellcome');
}

bootOnFramework();


function getAppKey() {

    return 'base64:'.base64_encode(
        \Illuminate\Encryption\Encrypter::generateKey(
            \Illuminate\Support\Facades\Config::get('app.cipher')
        )
    );
}

/**
 *
 *
 */
function clean_installation() {

    // delete temp file
    if(file_exists($path = laravel_path('storage/cms/installer.php'))){
        unlink($path);
    }

    // update env
    _env([
        'APP_INSTALLED'=> 'true',
        'APP_ENV'=> 'local',
        'APP_DEBUG'=> 'false',
        'SESSION_DRIVER' => 'database',
    ]);

    // generate log


    exit();
}
?>

<div class="card-body">
    <h1>Installation Finished</h1>
    <p>Application has been successfully installed</p>
</div>
<div class="card-footer">
    <a href="/admin" class="btn btn-next">Login</a>
</div>
