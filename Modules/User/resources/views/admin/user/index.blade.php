@section('title' , __('Search In Users'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Users'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Users')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a class="btn btn-sm fw-bold  btn-primary" data-bs-toggle="modal" data-bs-target="#create_modal">
            {{__('Add New User')}}
        </a>
        <div class="modal fade" tabindex="-1" id="create_modal">
            @include('user::admin.user._create_model')
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.delete').on('click', function () {
                let id = $(this).data('id');
                Swal.fire({
                    text: "{{__('Are you sure you want to delete it')}}",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "{{__('Yes, Delete!')}}",
                    cancelButtonText: "{{__('No, Cancel')}}",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function (e) {
                    makeAjaxRequest('/admin/users/' + id, 'DELETE', null, "json", function (res) {
                        if (res.success) {
                            toastr.success('{{ __('The Operation Done Successfully') }}');
                            $('#tr' + id).remove()
                        }

                    })
                }))
            })
        })
    </script>
@endsection
<x-admin-layout>
    <x-admin.table :model="$model" search="Search In Users">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="min-w-125px">{{__('Name')}}</th>
            <th class="min-w-125px">{{__('Mobile')}}</th>
            <th class="min-w-125px">{{__('Last Login')}}</th>
            <th class="min-w-125px">{{__('Created At')}}</th>
            <th class="text-end min-w-100px"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($model as $user)
            <tr id="tr{{$user->id}}">

                <td class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <img src="{{$user->avatar}}" alt="client"/>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <a href="#"
                           class="text-gray-800 mb-1">{{$user->name}}
                        </a>
                        <a class="text-hover-primary text-gray-500" target="_blank"
                           href="mailto:{{$user->email}}">{{$user->email}}</a>
                    </div>
                    <!--begin::User details-->
                </td>

                <td>
                    <a href="tel:{{$user->mobile}}" target="_blank">
                        {{$user->mobile}}
                    </a>
                </td>


                <td>
                    <div class="badge badge-light fw-bolder">
                        {{$user->last_login_human}}
                    </div>
                </td>

                <td>{{$user->created_at}}</td>

                <td>
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{$user->id}}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <div class="modal fade" tabindex="-1" id="edit_modal{{$user->id}}">
                        @include('user::admin.user._edit_model' , $user)
                    </div>

                    <a class="btn btn-sm btn-danger delete" data-id="{{ $user->id }}">
                        <i class="bi bi-trash"></i>
                    </a>

                </td>

            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
</x-admin-layout>


