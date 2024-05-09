<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Theme;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Facades\Seo;
use App\Facades\ThemeOption;
use App\Rules\PostSlug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(30);
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $theme      = Theme::current();
        $locale     = app()->getLocale();

        $languages  = $theme->languages();
        $layouts    = $theme->layouts();

        return view('pages.create', compact('languages', 'layouts', 'locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:5|max:255',
            'slug'      => ['nullable', 'max:100', 'unique:pages'],
            'summary'   => ['required', 'min:2', 'max:300', 'unique:pages',],
            'content'   => ['required', 'min:2', 'max:6000'],
        ]);

        $seo = Seo::create($request->seo);

        $page = Page::create([
            'seo_id'    => $seo->id,
            'locale'    => app()->getLocale(),
            'title'     => $request->title,
            'slug'      => $request->input('slug', ''),
            'user_id'   => Auth::user()->id,
            'layout'    => $request->layout,
            'summary'   => $request->summary,
            'content'   => $request->content,
            'thumbnail' => $request->thumbnail,
        ]);

        //for home page
        if($page->slug == ''){
            $s = ThemeOption::set('page_home', $page->id);
        }

        toastr()->info('Page Successfully Created.');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);

        if (!Route::has("page")) {
            return abort(404);
        }

        return redirect()->route('page', $page->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $theme      = Theme::current();
        $languages  = $theme->languages();
        $layouts    = $theme->layouts();

        return view('pages.edit', compact('page', 'languages', 'layouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'     => 'required|min:2|max:255',
            'slug'      => ['nullable', 'min:2', 'max:100', new PostSlug('page', true)],
            'layout'    => 'required',
            'status'    => 'required',

            'content'   => ['required', 'string', 'min:2', 'max:20000'],
        ]);

        $data = $request->except(['_token', '_method']);

        Seo::update($page->id, $request->seo);
        unset($data['seo']);

        // fixed layout
        if(isset($data['layout'])){
            $data['layout'] = $request->layout;
        }

        //for home page
        if($data['slug'] == ''){
            $s = ThemeOption::set('page_home', $page->id);
        }

        $page->update($data);

        return redirect()->route('pages.index')->withSuccess("Page Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page != null){
            $page->delete();
        }
        return redirect()->route('pages.index')->withSuccess("Page Deleted Successfully.");
    }
}
