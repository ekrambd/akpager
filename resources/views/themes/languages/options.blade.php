@extends('layouts.app')

@section('page_title', __( 'theme.index.options.title' ) )

@section('breadcrumb')
<div class="col-sm-6 p-md-0">
    <div class="welcome-text">
        <h4>{{ __( 'theme.index.options.breadcrumb.title' ) }}</h4>
    </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

</div>
@endsection

@section('page')

<form id="theme_options" action="{{ route('themes.options') }}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <div id="theme-option-header">
                <div class="display_header">
                    <h2>{{__("Theme options")}}</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="theme-option-body">
                <div class="row pt-2 pb-2">
                    <div class="col">
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>

                <form id="theme_options" method="POST" action="{{ route('themes.update_options') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {!! clean($content) !!}
                    </div>
                </form>

                <div class="row pt-2 pb-3">
                    <div class="col">
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@push('footer')
    <script>
var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})


    </script>
@endpush
