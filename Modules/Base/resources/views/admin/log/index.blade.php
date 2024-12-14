@section('title' , __('Logs & Bugs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Logs & Bugs'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Logs & Bugs')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">

    </div>
@endsection
@section('js')
@endsection
<x-admin-layout>
    <x-admin.table :model="$model" :formUrl="route('admin.logs.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">

            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>
            <th class="min-w-125px">#</th>
            <th class="min-w-125px">{{__('Log title')}}</th>
            <th class="min-w-125px">{{__('Logged At')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $item)
            <tr class="table-{{$item->color}}">
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$item->id}}"/>
                    </div>
                </td>
                <td>
                    <a href="{{route('admin.logs.show' , $item->id)}}">
                        <strong>
                            #{{$item->id}}
                        </strong>

                    </a>
                </td>
                <td>{{ Str::limit($item->message) }}</td>

                <td>{{$item->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
</x-admin-layout>


