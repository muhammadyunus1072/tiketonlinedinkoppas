@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

<div class="row d-flex justify-content-center mt-5">
    <!--begin::Aside-->
    <div class="col-10 col-md-4 row d-flex justify-content-center">
        <!--end::Image-->
        <!--begin::Title-->
        <h1 class="text-gray-800 fs-2qx fw-bold text-center">{{ config('template.title') }}</h1>
        <!--end::Title-->
        <!--begin::Text-->
        <div class="text-gray-600 fs-1qx text-center fw-semibold mb-8">
            {{ config('template.subtitle') }}
        </div>
        <!--end::Text-->
        <livewire:page.register />
    </div>
    <!--begin::Aside-->
</div>
@endsection
