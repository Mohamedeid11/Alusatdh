@extends('errors.layout')

@section('code')
    <img src="{{asset('assets/media/auth/404-error-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="404">
@endsection

@section('message')
    {{ $exception->getMessage() }}
@endsection
