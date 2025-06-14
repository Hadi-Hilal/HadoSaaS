@section('title' , __('Dashboard'))
@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard'],

        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Dashboard')" :breadcrumbItems="$breadcrumbItems"/>
@endsection
<x-admin-layout>
    @can('App Monitoring')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a target="_blank" href="/{{config('telescope.path')}}">
                        <!--begin::Illustration-->
                        <!--end::Illustration-->
                        <!--begin::Label-->
                        <span class="fw-bolder fs-3 text-gray-600 text-hover-primary">Telescope</span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a target="_blank" href="/{{config('pulse.path')}}">
                        <!--begin::Illustration-->
                        <!--end::Illustration-->
                        <!--begin::Label-->
                        <span class="fw-bolder fs-3 text-gray-600 text-hover-primary">Pulse</span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
    </div>
    @endcan
</x-admin-layout>
