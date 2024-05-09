<?php

defined('LARAVEL_START') or die("Direct action not allowd");

// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}
// guard or back to previus
if(!permission('permissions')){
    redirectTo('wellcome');
}


/**
 * Get permissions
 *
 * @return array
 */
function get_permissions() : array {

    $data =  [
        'storage/app'                   => [
          'target_mode' => 755,
          'is_file' => false,
        ],
        'storage/framework/cache'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/framework/sessions'    => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/framework/views'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/app/env-backup'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/app/backups/files'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/app/backups/temp'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/app/restores/file'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/app/restores/temp'       => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'storage/logs'                  => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        'bootstrap/cache'               => [
            'target_mode' => 755,
            'is_file' => false,
        ],
        '.env' => [
            'target_mode' => 600,
            'is_file' => true,
        ],
    ];

    foreach ($data as $key => $value) {

        $data[$key]['current_mode'] = 00;// (int)substr(sprintf('%o', fileperms(laravel_path($key))), -4);

        if($data[$key]['is_file']){
            $data[$key]['exists']  = file_exists( laravel_path($key) );
        }else{

            // try to make dir
            $dir = laravel_path($key);
            if(!is_dir( $dir ) ){
                if(!is_dir(dirname($dir)) && is_dir(dirname($dir, 2)) && is_writeable(dirname($dir, 2))){
                    mkdir(dirname($dir));
                }else if(is_dir(dirname($dir)) && is_writeable(dirname($dir))){
                    mkdir($dir);
                }
            }

            $data[$key]['exists']  = is_dir( laravel_path($key) );
        }

        if($data[$key]['exists']){
            $data[$key]['current_mode'] = (int)substr(sprintf('%o', fileperms(laravel_path($key))), -4);
        }

        $status = (int)$data[$key]['current_mode'] < (int)$data[$key]['target_mode'];
        // error
        $data[$key]['error']  = $status && $data[$key]['exists'];
    }

    return $data;
}

/**
 * Ensure permission has any error
 *
 * @return mixed
 */
function permission_has_error() {

    foreach (get_permissions() as $permission) {
        if($permission['error'] ){
            return true;
        }
    }

    installer_log('Check Permissions success', true);
    return false;
}


// handle form
if(isPost()){

    if(permission_has_error()){
        redirectTo('permissions');
    }else{
        permission('requirements', true);
        redirectTo('requirements');
    }

}

?>

<div class="card-body">
    <ul class="list-group  list-group-flush">
        <?php foreach (get_permissions() as $path => $permission): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center <?= $permission['error']? ' list-group-item-danger': '' ?>">
            <div><?= $path ?> </div>
            <div class="">
                <?php if( !$permission['error'] ): ?>
                    <span class="badge bg-primary rounded-pill">
                        <i class="feather-check-circle"></i>
                    </span>
                    <?php else: ?>
                    <span class="badge bg-danger rounded-pill">
                        <i class="feather-x-circle"></i>
                    </span>
                <?php endif ?>
                <span><?=  $permission['target_mode'] ?></span>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div>
<div class="card-footer">
<?php if (permission_has_error()) : ?>
    <a href="<?= url(); ?>" class="btn btn-danger">Try again</a>
<?php else: ?>
    <form action="<?= url(); ?>" method="post">
        <button type="submit" class="btn btn-next">Next</button>
    </form>
<?php endif; ?>
</div>
