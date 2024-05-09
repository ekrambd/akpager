@extends('layouts.app')

@section('page_title', __('Seo Settings'))

@section('page')
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <ul class="list-group list-group-flush">
                <a href="{{ route('settings.general') }}" class="list-group-item">@lang('General')</a>
                <a href="{{ route('settings.auth') }}" class="list-group-item">@lang('Authentication')</a>
                <a href="{{ route('settings.notifications') }}" class="list-group-item">@lang('Notifications')</a>
                <a href="{{ route('settings.mail') }}" class="list-group-item">@lang('Mail')</a>
                <a href="{{ route('settings.pages') }}" class="list-group-item">@lang('pages')</a>
                <a href="{{ route('settings.seo') }}" class="list-group-item active">@lang('Seo')</a>
            </ul>
        </div>

        <div class="col-lg-8 col-xl-9">
            <form method="POST" action="{{ route('settings.update') }}">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>@lang('Seo')</h3> @lang('Configure SEO settings.')
                        </div>
                    </div>

                    @csrf
                    <div class="card-body">

                        <div class="mb-3">
                            <label>@lang('Google') </label>
                            <input name="google_verification_code" value="{{ option('google_verification_code') }}" type="text" class="form-control">
                            <small>
                                @lang('Get your verification code in')
                                <a href="https://search.google.com/search-console/users" target="_blank">
                                    @lang('Google Search console')
                                </a>
                            </small>
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
