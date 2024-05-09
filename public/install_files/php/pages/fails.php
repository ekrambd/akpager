<?php
defined('LARAVEL_START') or die("Direct action not allowd");

// handle form
if(isPost()){

    if($_GET['reset'] === '1'){
        permission('wellcome', true);
        redirectTo('wellcome');
    }else{
        permission('fails', true);
        redirectTo('fails');
    }

}

// guard or back to previus
if(!permission('fails') ){
    redirectTo('fails');
}

?>

<!-- fails  -->
<div class="card-body">
    <h3>There was something wrong during the installation!</h3>
    <p>
    Please check your log located inside <code>storage/logs/installer.log</code> directory to see what's going on.
    </p>
</div>
<div class="card-footer">
    <form action="<?= url(); ?>?reset=1" method="post">
        <button type="submit" class="btn btn-next">Try Again</button>
    </form>
</div>