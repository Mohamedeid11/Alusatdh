@extends('layouts.app')

@section('meta')
    <base href="">
    <title>AL AUSTADH</title>
@endsection

<!--begin::Content-->
@section('crumbs')
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
        <li class="breadcrumb-item text-dark">Country</li>
        <!--end::Item-->

    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')

@endsection
<!--end::Content-->
