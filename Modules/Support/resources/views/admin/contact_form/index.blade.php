@section('title' , __('Contacts'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Contacts'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Contacts')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection
@section('js')

@endsection
<x-admin-layout>
    <x-admin.table :model="$model" search="Search In Contacts"
                   :formUrl="route('admin.contact_forms.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th>{{__('Details')}}</th>
            <th>{{__('Ip Address')}}</th>
            <th>{{__('Subject')}}</th>
            <th>{{__('Message')}}</th>
            <th>{{__('Created At')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $contact)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$contact->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex flex-column">
                        <span class="text-gray-800 mb-1">
                            {{$contact->name}}
                        </span>
                        <a class="text-hover-primary text-gray-500" target="_blank"
                           href="tel:{{$contact->mobile}}">{{$contact->mobile}}</a>
                        <a class="text-hover-primary text-gray-500" target="_blank"
                           href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                    </div>
                </td>

                <td>
                    <a href="https://whatismyipaddress.com/ip/{{$contact->ip_address}}" target="_blank">
                        {{$contact->ip_address}}
                    </a>
                </td>

                <td>
                    {{$contact->subject}}
                </td>
                <td>
                    {{$contact->message}}
                </td>
                <td>
                    {{$contact->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
    <!--end::Card-->
</x-admin-layout>


