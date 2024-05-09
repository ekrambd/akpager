<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}
// guard or back to previus
if(!permission('requirements')){
    redirectTo('permissions');
}


/**
 * Get server requirements
 *
 * @return array
 */
function get_requirements() : array {

    $extensions = array(
        'openssl',
        'mbstring',
        'tokenizer',
        'JSON',
        'cURL',
        'bcmath',
        'PDO',
        'pdo_mysql',
        'mbstring',
        'tokenizer',
        'xml',
        'ctype',
        'json',
        'gd',
        'fileinfo',
    );

    $requirements = [
        "PHP Version (>= 8.1.0)" => version_compare(phpversion(), "8.1.0", '>='),
    ];
    foreach ($extensions as $extension) {
        $requirements[$extension . ' Extension'] = extension_loaded($extension);
    }

    if (extension_loaded('xdebug')) {
        $requirements['Xdebug Max Nesting Level (>= 500)'] = (int)ini_get('xdebug.max_nesting_level') >= 500;
    }

    return $requirements;
}


/**
 * Ensure requirement has any error
 *
 * @return mixed
 */
function requirement_has_error() {

    foreach (get_requirements() as $status) {
        if($status == false){
            return true;
        }
    }

    return false;
}

// handle form
if(isPost()){

    if(requirement_has_error()){
        redirectTo('requirements');
    }else{
        permission('database', true);
        redirectTo('database');
    }

}


?>

<div class="card-body">

    <ul class="list-group  list-group-flush">
        <?php foreach (get_requirements() as $key => $status): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center <?php if(!$status) echo " list-group-item-danger"; ?>">
            <div><?php echo $key; ?> </div>
            <?php if( $status): ?>
                <span class="badge bg-primary rounded-pill">
                    <i class="feather-check-circle"></i>
                </span>
                <?php else: ?>
                <span class="badge bg-danger rounded-pill">
                    <i class="feather-x-circle"></i>
                </span>
            <?php endif ?>
        </li>
        <?php endforeach;?>
    </ul>

</div>
<div class="card-footer">
<?php if (requirement_has_error()) : ?>
    <a href="<?php echo url('requirements'); ?>" class="btn btn-danger">Try again</a>
<?php else : ?>
    <form action="<?= url(); ?>" method="post">
        <button type="submit" class="btn btn-next">Next</button>
    </form>
<?php endif; ?>
</div>
