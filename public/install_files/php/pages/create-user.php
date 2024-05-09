<?php
defined('LARAVEL_START') or die("Direct action not allowd");

// guard or back to previus
if(permission('fails') ){
    redirectTo('fails');
}

$db = new DB();

// database connecton fails
if( !$db->hasDBconnection()){
    redirectTo('database');
}

// guard or back to previus
if(!permission('create-user') || empty($db->getAllTables())){
    redirectTo('seed');
}


// handle form
if(isPost()){

    ob_end_clean();

    $email = _post('email');
    $password = _post('password');

    // validate information
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return json_response('Email is not valid', 422);
    }
    if(strlen($password) < 6){
        return json_response('Password must be at least 6 characters', 422);
    }


    permission('success', true);

    bootOnFramework();

    $role = \App\Models\Role::findByName('admin');
    // remove duplicate
    $users = \App\Models\User::where('email', $email)->get();
    foreach ($users as $user) {
        if( $user != null ){
            $user->delete();
        }
    }

    $data = [
        'id' => "".\Illuminate\Support\Str::uuid(),
        'email' => $email,
        'password' => bcrypt($password),
        'role_id' => $role->id,
        'email_verified_at' => now(),
        'avatar' => asset('storage/2021/11/avatar.png'),
    ];

    $user = \App\Models\User::create($data);

    // generate assets links
    \Illuminate\Support\Facades\Artisan::call('cms:assets', [
        '--force' => true
    ]);

    \Illuminate\Support\Facades\Artisan::call('storage:link', [
        '--force' => true
    ]);


    json_response('Information update success', 200, $user->toArray());
    exit();
}
?>
<div class="card-body">
    <form class="m-3" id="createUserForm" method="post" action="<?= url() ?>">
        <div class="row mb-3" id="db_error" style="display: none;">  </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">
                Email
            </label>
            <div class="col-sm-9">
                <input name="email" value="" type="email" class="form-control">

                <div class="form-text">
                    Double-check your email address before continuing.
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">
                Password
            </label>
            <div class="col-sm-9">
                <input name="password" type="password" class="form-control">

                <div class="form-text">
                <strong>Important:</strong> You will need this password to log in. Please store it in a secure location.
                </div>
            </div>

        </div>

    </form>
</div>
<div class="card-footer">
    <button type="button" id="createUserFormBtn" class="btn btn-next">Next</button>
</div>

<form id="successPage" action="<?= next_url() ?>" method="post" style="display: none;">
    <input type="hidden" name="email" value="" />
</form>
