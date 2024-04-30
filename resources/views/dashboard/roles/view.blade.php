@extends('dashboard.layouts.app')

@section('meta')
    <base href="">
    <title>AL AUSTADH | Roles</title>
@endsection

@section('custom-css')
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
@endsection

@section('crumbs')
    <!--begin::Title-->
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">View Role</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start mx-4"></span>
    <!--end::Separator-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('index')}}" class="text-muted text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('roles.index')}}" class="text-muted text-hover-primary">Roles</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">View Role</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    @include('dashboard.layouts.alerts')
    <!--begin::Post-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="mb-0">{{$role->name}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                @if ($role)
                                    @php
                                        $permissionGroups = [];
                                    @endphp
                                    @foreach($role->permissions as $permission)
                                    @php
                                        $permissionName = explode('.', $permission->name)[0];
                                        if (!isset($permissionGroups[$permissionName])) {
                                            $permissionGroups[$permissionName] = [];
                                        }
                                        $permissionGroups[$permissionName][] = $permission->name;
                                    @endphp
                                    @endforeach
                                    @foreach($permissionGroups as $groupName => $groupPermissions)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>{{ $groupName }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-0">
                            <button type="button" class="btn btn-light btn-active-primary"
                                    data-bs-toggle="modal" data-bs-target="#editRoleModal-{{ $role->id }}">Edit Role</button>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modal - Update role-->
                    <div class="modal fade" id="editRoleModal-{{ $role->id }}" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-750px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Update Role</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                        <i class="ki-duotone ki-cross fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 my-7">
                                    <!--begin::Form-->
                                    <form class="form" action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true"
                                             data-kt-scroll-activate="{default: false, lg: true}"
                                             data-kt-scroll-max-height="auto"
                                             data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                             data-kt-scroll-wrappers="#kt_modal_add_role_scroll"
                                             data-kt-scroll-offset="300px">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Role name</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="Enter a role name" name="name" value="{{$role->name}}"/>
                                                @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Permissions-->
                                            <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                                <!--end::Label-->
                                                <!--begin::Table wrapper-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                        <!--begin::Table body-->
                                                        <tbody class="text-gray-600 fw-semibold">
                                                        <!--begin::Table row-->
                                                        <tr>
                                                            <td class="text-gray-800">
                                                                Administrator Access
                                                                <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Allows a full access to the system">
                                                            <i class="ki-duotone ki-information fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                            </td>
                                                            <td>
                                                                <!--begin::Checkbox-->
                                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                                    <input type="checkbox" id="all_checked" class="form-check-input" onclick="checkAllPermission()">
                                                                    <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </td>
                                                        </tr>
                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->
                                                        @foreach($permissions as $key => $permission)
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">
                                                                    <input type="checkbox" id="{{ $key }}" class="form-check-input all_checked" onclick="sendNameOfPermission('{{ $key }}')" />
                                                                    {{ $key }}
                                                                </td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        @foreach ($permission as $item)
                                                                            <!--begin::Checkbox-->
                                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input type="checkbox" class="form-check-input {{ $key }} all_checked"  name="permissions[{{ $item['id'] }}]" value="{{ $item['id'] }}" @if(is_array(old('permissions')) && in_array($item['id'] , old('permissions'))) checked @endif {{ in_array($item['id']  , $role->permissions->pluck('id')->toArray())  ? 'checked' : ''}}/>
                                                                                <span class="form-check-label">{{ $item['name'] }}</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        @endforeach
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                        @endforeach

                                                        <!--end::Table row-->
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table wrapper-->
                                            </div>
                                            <!--end::Permissions-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>

                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Update role-->


                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-10">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header pt-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="d-flex align-items-center">
                                    Users Assigned
                                    <span class="text-gray-600 fs-6 ms-1">({{$role->users->count()}})</span>
                                </h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1"
                                     data-kt-view-roles-table-toolbar="base">
                                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Users" />
                                </div>
                                <!--end::Search-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>
                                        Selected
                                    </div>
                                    <button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">
                                        Delete Selected
                                    </button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0"
                                   id="kt_roles_view_table">
                                <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div
                                            class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox"
                                                   data-kt-check="true"
                                                   data-kt-check-target="#kt_roles_view_table .form-check-input"
                                                   value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-50px">ID</th>
                                    <th class="min-w-150px">User</th>
                                    <th class="min-w-125px">Joined Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                @foreach($role->users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="{{ $user->id}}" />
                                            </div>
                                        </td>
                                        <td>{{$user->id}}</td>
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div
                                                class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img src="{{storage_asset( $user->photo)}}"
                                                             alt="Emma Smith" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="apps/user-management/users/view.html"
                                                   class="text-gray-800 text-hover-primary mb-1">{{$user->full_name}}</a>
                                                <span>{{$user->email}}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                                        <td class="text-end">
                                            <a href="#"
                                               class="btn btn-sm btn-light btn-active-light-primary"
                                               data-kt-menu-trigger="click"
                                               data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 m-0"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="apps/user-management/users/view.html"
                                                       class="menu-link px-3">View</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
{{--                                                    <a href="#" class="menu-link px-3  text-danger" data-kt-roles-table-filter="delete_row" data-delete-route="{{ route('user.destroy' ,$user->id) }}" id="deleteLink">Delete</a>--}}
                                                    <form action="{{route('user.destroy' , $user->id)}}"  method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="menu-link px-3 text-danger"> DELETE </button>
                                                    </form>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Post-->
@endsection

@section('scripts')
    <script src="{{asset('assets/js/custom/apps/user-management/roles/view/view.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/roles/view/update-role.js')}}"></script>

    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>

    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only"), {
            display: {
                viewMode: "calendar",
                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false
                }
            }
        });

        function sendNameOfPermission(name) {

            $('#' + name).change(function() {
                if ($(this).is(":checked")) {
                    $('.' + name).prop('checked', true);
                } else {
                    $('.' + name).prop('checked', false);
                }
            });

            $("." + name).change(function() {
                if ($('.' + name + ':checked').length == $("." + name).length) {
                    $('#' + name).prop('checked', true);
                } else {
                    $('#' + name).prop('checked', false);
                }
            });

        }

        function checkAllPermission() {
            $('#all_checked').change(function() {
                if ($(this).is(":checked")) {
                    $('.all_checked').prop('checked', true);
                } else {
                    $('.all_checked').prop('checked', false);
                }
            });
        }

        $(".all_checked").change(function() {
            if ($('.all_checked:checked').length == $('.all_checked').length) {
                $('#all_checked').prop('checked', true);
            } else if ($('.all_checked:checked').length == $('.all_checked').length - 1) {
                $('#all_checked').prop('checked', true);
            } else {
                $('#all_checked').prop('checked', false);
            }
        });

    </script>
@endsection
