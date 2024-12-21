@section('title' , __('Newsletter Subscribers'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Newsletter Subscribers'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Newsletter Subscribers')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection
@section('js')

@endsection
<x-admin-layout>
    <x-admin.table :model="$model" search="Search In Contacts"
                   :formUrl="route('admin.subscribers.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th>{{__('Email')}}</th>
            <th>{{__('Ip Address')}}</th>
            <th>{{__('Language')}}</th>
            <th>{{__('Subscription Date')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $subscriber)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$subscriber->id}}"/>
                    </div>
                </td>

                <td>
                    <a href="mailto:{{$subscriber->email}}">
                        {{$subscriber->email}}
                    </a>
                </td>

                <td>
                    <a href="https://whatismyipaddress.com/ip/{{$subscriber->ip_address}}" target="_blank">
                        {{$subscriber->ip_address}}
                    </a>
                </td>

                <td>
                    {{$subscriber->lang}}
                </td>

                <td>
                    {{$subscriber->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
    <!--end::Card-->
</x-admin-layout>


