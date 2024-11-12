@props(['title', 'formUrl'])
<div class="card">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bolder">{{ __($title) }}</div>
        <!--end::Card title-->
    </div>
    <form method="POST" action="{{ $formUrl }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{ $slot }}
        </div>
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a href="{{ url()->previous() }}" class="btn btn-light btn-active-light-primary me-2">{{__('Discard')}}</a>
            <button type="submit" class="btn btn-primary" id="submit">{{__('Save Changes')}}</button>
        </div>            <!--end::Card footer-->

    </form>
</div>
