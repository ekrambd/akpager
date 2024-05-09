@extends('layouts.app')

@section('page_title', __('Pages List'))

@section('page')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Pages List') }}</h1>
                    <a href="{{ route('pages.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th><span>{{ __('Handle') }}</span></th>
                        </thead>
                        <tbody>
                            @foreach ($pages as $value)
                                <tr>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->slug }}</td>
                                    <td>
                                        <div>

                                            <a href="{{route('pages.show', $value->id )}}" class="btn btn-primary text-white" target="_blank"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('pages.edit', $value->id )}}" class="btn btn-info text-white mx-1"><i class="fas fa-pen"></i></a>
                                            <a href="{{ route('pages.destroy', $value->id) }}"
                                                class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top"
                                                title="@lang('Delete')" data-method="DELETE"
                                                data-confirm-title="@lang('Please Confirm')"
                                                data-confirm-text="@lang('Are you sure that you want to delete this category?')"
                                                data-confirm-button="@lang('Yes, delete!')">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
