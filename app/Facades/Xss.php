<?php

namespace App\Facades;

use App\Support\Xss as XssFacade;
use Illuminate\Support\Facades\Facade;

class Xss extends Facade
{
    /**
     * @see \App\Support\Env
     */
    protected static function getFacadeAccessor()
    {
        return XssFacade::class;
    }
}