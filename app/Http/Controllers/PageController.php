<?php

namespace App\Http\Controllers;

use App\Facades\Option;
use App\Http\Middleware\ThemeUseMiddleware;
use App\Models\Page;
use Plugins\Blog\Models\Post;
use DB;
use Str;
class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware(ThemeUseMiddleware::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {   
        $id = Option::get('page_home_id');

        $page =  Page::find(  $id );

        if (is_null($page)) {
            $page = Page::where('slug', '')->first();

            if(is_null($page)){
                return abort(404);
            }
            Option::set('page_home_id', $page->id);
        }

        if (!view()->exists($page->layout)) {
            throw new \Exception("Layout Not found: $page->layout", 1);
        }
        return view($page->layout, compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * map any page view
     *
     * @return \Illuminate\Http\Response
     */
    public function any($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if($page == null || $page->status != 'published'){
            return abort(404);
        }

        if (!view()->exists($page->layout)) {
            throw new \Exception("Layout Not found: $page->layout", 1);
        }

        return view($page->layout, compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        if(!class_exists(Post::class)){
            return abort(404);
        }

        $id = Option::get('page_blog_id');
        $page =  Page::find(  $id );

        if(is_null($page)){
            $page = Page::where('slug', 'blog')->first();
            if(is_null($page)){
                return abort(404);
            }
            Option::set('page_blog_id', $page->id);
        }

        return view($page->layout, compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {
        if(!class_exists(Post::class) || !view()->exists('theme::layouts.post') ){
            return abort(404);
        }

        $page = Post::where('slug', $slug)->first();
        if($page == null){
            return abort(404);
        }

        return view('theme::layouts.post', compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function sitemap()
    // {
    //     //
    // }

}
