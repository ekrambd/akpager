<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Support\Option as OptionFacade;

class Option extends Facade
{
    /**
     * @see \App\Support\Option
     */
    protected static function getFacadeAccessor()
    {
        return OptionFacade::class;
    }
}
