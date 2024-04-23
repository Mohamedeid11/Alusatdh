@extends('layouts.app')

@section('meta')
    <base href="">
    <title>AL AUSTADH</title>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
          content="Alustadh, learning, quraan, e-learning, lessons, kids, courses
          , learn online, learn arabic online , , web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://alustadh.com" />
    <meta property="og:site_name" content="Alustadh" />
@endsection

<!--begin::Content-->
@section('crumbs')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        Dashboard
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
    </h1>
@endsection

@section('content')
    @dd(auth()->user())
@endsection
<!--end::Content-->
