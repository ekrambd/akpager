<?php

namespace Plugins\Blog\Http\Controllers\Admin;

use App\Facades\Theme;
use App\Http\Controllers\Controller;
use Plugins\Blog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Plugins\Blog\Models\Post;
use App\Facades\Seo;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('posts.viewAny');

        $posts = Post::orderBy('created_at', 'desc')->paginate(30);
        return view('blog::post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('posts.viewAny');

        $theme      = Theme::current();
        $layouts    = $theme->layouts();
        $categories = Category::all();

        return view('blog::post.create', compact('layouts', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('posts.viewAny');

        $request->validate([
            'title'     => 'required|min:2|max:255',
            'slug'      => 'required|min:2|max:100|unique:blog_posts',
            'summary'   => ['required', 'min:2', 'max:300', 'regex:/^[a-zA-Z0-9\s\.,!?\'"()]+$/'],
            'content'   => ['required', 'min:2', 'max:700'],
            'category_id'  => 'required|exists:blog_categories,id',
        ]);

        $seo = Seo::create($request->seo);
        Post::create([
            'locale'            => app()->getLocale(),
            'user_id'           => Auth::user()->id,
            'seo_id'            => $seo->id,
            'category_id'       => $request->category_id,

            'title'             => $request->title,
            'slug'              => $request->slug,
            'layout'            => 'theme::layouts.post',
            'summary'           => $request->summary,
            'content'           => clean($request->content?? ""),
            'featured_image'    => $request->thumbnail,
        ]);

        alert()->primary("Page Successfully Created.");
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('posts.viewAny');

        $page = Post::findOrFail($id);

        if (!Route::has("post")) {
            return abort(404);
        }

        return redirect()->route('post', $page->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('posts.viewAny');

        $theme      = Theme::current();
        $layouts    = $theme->layouts();
        $categories = Category::all();

        return view('blog::post.edit', compact('post', 'layouts', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('posts.viewAny');

        $request->validate([
            'category_id'       => 'exists:blog_categories,id',
            'title'             => 'required|min:5|max:255',
            'slug'              => ['required', 'min:2', 'max:100', 'unique:blog_posts,slug,'.$post->id.',id'],
            'summary'           => 'required|string|max:500',
            'content'           => 'required|string|max:800',
            'thumbnail'         => 'max:800|nullable',
            'tags'              => 'max:255|nullable',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['featured_image'] = $data['thumbnail'];
        $data['layout']= 'theme::layouts.post';

        Seo::update($id = $post->id, $data['seo']);
        $post->update($data);

        return redirect()->route('posts.index')->withSuccess("Page Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('posts.delete');

        if($post != null){
            $post->delete();
        }

        toastr()->success("Post Deleted Successfully.");
        return redirect()->route('posts.index');
    }
}
