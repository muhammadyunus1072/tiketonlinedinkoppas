@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <!--begin::Aside-->
        <div class="col-10 col-md-4 row d-flex justify-content-center">
            <div class="col-auto">
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-4 p-5 rounded bg-{{ config('template.logo_auth_background') }}"
                    src="{{ asset(config('template.logo_auth')) }}" alt="" />
            </div>
            <!--end::Image-->
            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center">{{ config('template.title') }}</h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="text-gray-600 fs-1qx text-center fw-semibold mb-8">
                {{ config('template.subtitle') }}
            </div>
            <!--end::Text-->
            <livewire:page.index />
        </div>
        <!--begin::Aside-->
    </div>
@endsection
