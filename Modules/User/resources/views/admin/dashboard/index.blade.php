@section('title' , __('Dashboard'))
@section('toolbar')
        @php
        $breadcrumbItems = [
            ['label' => 'Dashboard'],

        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Dashboard')" :breadcrumbItems="$breadcrumbItems"/>
@endsection
<x-admin-layout></x-admin-layout>
