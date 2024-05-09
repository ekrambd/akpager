<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AssetController extends Controller
{

    private function assets() {
        Artisan::call('cms:assets');
        return back();
    }

    /**
     * Display a listing of the resource.
     */
    public function themes()
    {
        $this->assets();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function plugins()
    {
        $this->assets();
    }

}
