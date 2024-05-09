<?php

use Demo\Wokoya\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| faq Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/demos', function (){

        return view("demo::index");
    })->middleware(['web']);


