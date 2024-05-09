<?php

/**
 * Ensure .env write able issue
 *
 * php .\artisan serve --no-reload
 */

defined('LARAVEL_START') or die("Direct action not allowd");

// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

// handle form
if(isPost()){


    installer_log("start", true);
    permission('permissions', true);

    redirectTo('permissions');
}

?>
<div class="card-body">

    <div class="mb-3">
        <p>Du7 is a cms system based on Laravel and Bootstrap. Related with <a href="https://codecanyon.net/page/item_support_policy" target="_blank" rel="noopener noreferrer">Codecanyon</a> standard licenses.</p>
        <p>We design this template for developer to modifi and redevelop any type of laravel project</p>
        <p>If you have any questions that are beyond the scope of this cms, feel free to email at <a href="mailto:ducorteam@gmail.com">ducorteam@gmail.com</a></p>
    </div>
    <ul>
        <li>By: <a href="https://jubayed.com" target="_blank"><strong>Ducor Team</strong></a></li>
        <li>Platform: <a href="http://laravel.com" target="_blank" rel="noopener noreferrer"><strong>Laravel Framework</strong></a></li>
        <li>Css Framework: <a href="http://getbootstrap.com" target="_blank" rel="noopener noreferrer"><strong>Bootstrap</strong></a></li>
        <li>Email: <a href="mailto:ducorteam@gmail.com">ducorteam@gmail.com</a></li>
    </ul>

    <div>
        We accept any custom offer
    </div>
</div>
<div class="card-footer">
    <form action="<?= url(); ?>" method="post">
        <button type="submit" class="btn btn-next">Start</button>
    </form>
</div>
<!-- permissions -->

