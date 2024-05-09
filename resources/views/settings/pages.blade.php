@extends('layouts.app')

@section('page_title', __('Pages Settings'))

@section('page')
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <ul class="list-group list-group-flush">
                <a href="{{ route('settings.general') }}" class="list-group-item">@lang('General')</a>
                <a href="{{ route('settings.auth') }}" class="list-group-item">@lang('Authentication')</a>
                <a href="{{ route('settings.notifications') }}" class="list-group-item">@lang('Notifications')</a>
                <a href="{{ route('settings.mail') }}" class="list-group-item">@lang('Mail')</a>
                <a href="{{ route('settings.pages') }}" class="list-group-item active">@lang('pages')</a>
                <a href="{{ route('settings.seo') }}" class="list-group-item">@lang('Seo')</a>
            </ul>
        </div>

        <div class="col-lg-8 col-xl-9">
            <form method="POST" action="{{ route('settings.update') }}">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>@lang('Pages')</h3> @lang('Configure Pages settings.')
                        </div>
                    </div>

                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="seo_visibility" value="off">
                            <input name="seo_visibility" value="on" type="checkbox" data-toggle="toggle"
                                data-size="sm" @if (option('seo_visibility') == 'on') checked @endif>
                            <label class="form-check-label">@lang('Search engine visibility')</label>
                            <br/>
                            <small class="form-text text-muted">
                                @lang('It is up to search engines to honor this request')
                            </small>
                        </div>

                        <div class="mb-3">
                            <label>@lang("Home Page")</label>
                            <select name="page_home_id" class="form-control">
                                @foreach ($pages as $page)
                                <option value="{{$page->id}}" @if ($page->id == option('page_home_id')) selected @endif>
                                    {{$page->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>@lang("Blog Page")</label>
                            <select name="page_blog_id" class="form-control">
                                @foreach ($pages as $page)
                                <option value="{{$page->id}}"  @if ($page->id == option('page_blog_id')) selected @endif>
                                    {{$page->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
