@section('title' , __('Pages'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Pages'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Pages')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a class="btn btn-sm fw-bold  btn-primary" href="{{route('admin.pages.create')}}">
            {{__('Add New Page')}}
        </a>
    </div>
@endsection
@section('js')
@endsection
<x-admin-layout>
    <x-admin.table :model="$model" search="Search In Pages" :form-url="route('admin.pages.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="min-w-200px"></th>
            <th class="min-w-200px">{{__('Title')}}</th>
            <th class="min-w-150px">{{__('Featured')}}</th>
            <th class="min-w-150px">{{__('Publish Status')}}</th>
            <th class="min-w-150px">{{__('Created At')}}</th>
            <th class="min-w-150px"><i class="bi bi-eye text-primary fa-2x"></i></th>
            <th class="min-w-200px text-end rounded-end"></th>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $page)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$page->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$page->image_link}}" target="_blank" class="symbol me-5">
                            <img src="{{$page->image_link}}"
                                 alt="{{$page->title}}"/>
                        </a>
                    </div>
                </td>
                <td>
                    <h5>
                        <a href="" target="_blank"
                           class=" fw-bolder text-hover-primary mb-1 fs-6">{{$page->title}}</a>
                    </h5>
                </td>
                <td>
                    {{$page->featured ? __('Yes') : __('No') }}
                    @if($page->featured)
                        <i class="bi bi-check-circle-fill text-success"></i>
                    @else
                        <i class="bi bi-x-circle-fill text-danger"></i>
                    @endif
                </td>
                <td>
                    <span
                        class="badge badge-light-{{$page->status == 'Published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($page->status)}}</span>
                </td>
                <td>
                    {{$page->created_at->diffForHumans() }}
                </td>
                <td>
                    {{$page->visits }}
                </td>
                <td>
                    <a href="{{route('admin.pages.edit' , $page->id)}}"
                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-message-edit fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
</x-admin-layout>


