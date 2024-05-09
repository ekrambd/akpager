<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AssetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('themes', [AssetController::class, 'themes']);
Route::get('plugins', [AssetController::class, 'plugins']);

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
// custom page
Route::get('/{slug}', [PageController::class, 'any'])->name('page')->where('slug', '.*');

