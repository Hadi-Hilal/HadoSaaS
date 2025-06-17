@section('title' , __('Blogs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Blogs'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Blogs')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a class="btn btn-sm fw-bold  btn-primary" href="{{route('admin.blogs.create')}}">
            {{__('Add New Blog')}}
        </a>
    </div>
@endsection
@section('js')
@endsection
<x-admin-layout>
    <x-admin.table :model="$model" search="Search In Blogs" :form-url="route('admin.blogs.deleteMulti')">
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
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $blog)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$blog->id}}"/>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$blog->image_link}}" target="_blank" class="symbol me-5">
                            <img src="{{$blog->image_link}}" alt="{{$blog->title}}"/>
                        </a>
                    </div>
                </td>
                <td>
                    <h5>
                        <a href="" target="_blank"
                           class=" fw-bolder text-hover-primary mb-1 fs-6">{{$blog->title}}</a>
                    </h5>
                </td>
                <td>
                    {{$blog->featured ? __('Yes') : __('No') }}
                    @if($blog->featured)
                        <i class="bi bi-check-circle-fill text-success"></i>
                    @else
                        <i class="bi bi-x-circle-fill text-danger"></i>
                    @endif
                </td>
                <td>
                    <span
                        class="badge badge-light-{{$blog->status == 'Published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($blog->status)}}</span>
                </td>
                <td>
                    {{$blog->created_at->diffForHumans() }}
                </td>
                <td>
                    {{$blog->visits }}
                </td>
                <td>
                    <a href="{{route('admin.blogs.edit' , $blog->id)}}"
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
    </x-admin.table>
</x-admin-layout>
