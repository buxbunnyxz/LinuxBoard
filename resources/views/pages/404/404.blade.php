@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="min-vh-100 content-center">
                <div class="error-page text-center">
                    <img src="{{ asset('assets/img/svg/404.svg') }}" alt="404" class="svg">
                    <div class="error-page__title">404</div>
                    <h5 class="fw-500">{{ __('error_404.sorry') }}</h5>
                    <div class="content-center mt-30">
                        <a href="{{ route('dashboard.demo_one',app()->getLocale()) }}" class="btn btn-primary btn-default btn-squared px-30">{{ __('error_404.return_home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
