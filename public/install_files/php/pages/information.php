<?php
defined('LARAVEL_START') or die("Direct action not allowd");
// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

$db = new DB();

// guard or back to previus
if(!permission('information') || !$db->hasDBconnection()){
    redirectTo('database');
}

permission('migrate', true);

// handle form
if(isPost()){

    $app_locale = _post('APP_LOCALE');
    $app_url = _post('APP_URL');
    $asset_url = _post('ASSET_URL');
    $db_table_empty = _post('db_table_empty', 'off');

    if (
        str_contains($app_locale, '#') ||
        str_contains($app_url, '#') ||
        str_contains($asset_url, '#')
    ) {
        json_response('Please change. [#] is not valied.env value', 500);
    }else{

        _env([
            'APP_LOCALE' => $app_locale,
            'APP_URL' => $app_url,
            'ASSET_URL' => $asset_url,
        ]);

        if($count = count($db->getAllTables())){
            if($db_table_empty == "on"){

               $db->dropAllTables();
            }else{
                json_response("We found [{$count}] Table in current database", 500);
            }
        }

        permission('migrate', true);
        json_response('Information update success', 200);
        exit();
    }
}

?>

<div class="card-body">

    <form class="m-3" id="informationForm" method="post" action="<?= url() ?>">

        <div class="mb-3" id="db_error" style="display: none;"></div>

        <div class="mb-3">
            <label> App Language </label>
            <input name="APP_LOCALE" value="<?= _env('APP_LOCALE') ?>" class="form-control"  required />
        </div>
        <div class="mb-3">
            <label> App Url </label>
            <input name="APP_URL" value="<?= _laravel_url() ?>" class="form-control"  required />
        </div>

        <div class="mb-3">
            <label> Asset Url </label>
            <input name="ASSET_URL" value="<?= _laravel_url() ?>" class="form-control" required />
        </div>

        <?php if($count = count($db->getAllTables()) ): ?>
            <div id="db-count-msg" class="alert alert-danger mb-3 bg-danger text-white">
                <p>We found <?= $count ?> Table in current database.  Be careful, it will remove all of data permanently.</p>
                <label class="" for="db_table_empty">
                    <input  name="db_table_empty" type="checkbox" id="db_table_empty" />
                    <span>Remove all table</span>
                </label>
            </div>
        <?php endif ?>
    </form>

</div>

<div class="card-footer">
    <button type="button" id="informationFormBtn" class="btn btn-next">Next</button>
</div>
