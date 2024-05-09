<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'core' => [
        'minPhpVersion' => '8.0.0',
    ],
    'final' => [
        'key' => true,
        'publish' => false,
    ],
    'requirements' => [
        'php' => [
            'openssl',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
            'bcmath',
            'PDO',
            'pdo_mysql',
            'pdo_sqlite',
            'mbstring',
            'tokenizer',
            'xml',
            'ctype',
            'json',
            'gd',
            'fileinfo',
          //  'xdebug'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/app/'              => 775,
        'storage/framework/'        => 775,
        'storage/logs/'             => 775,
        'bootstrap/cache/'          => 775,
        'themes/'                   => 775,
        'resources/lang/'           => 775,
        '.env'                      => 666 ,
    ],
];
