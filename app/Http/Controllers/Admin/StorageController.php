<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function link_create(Filesystem $files)
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        if( file_exists( $link )){
            $files->delete($link);
        }

        // if( file_exists($path )){
        //     return \back()->with(['message' => "Fail: unable to delete Storage link. delete manually ~/public/storage", 'alert-type' => 'error']);
        // }

        $files->link($target, $link);

        return \back()->with(['message' => "Success to create storage link", 'alert-type' => 'success']);
    }

}
