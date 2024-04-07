@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

<div class="w-100">
    <img class="theme-light-show" style="width: 100%;"
                    src="{{ asset('files/images/header.jpeg') }}" alt="" />
    <div class="row d-flex justify-content-center mt-5">
        <!--begin::Aside-->
        <div class="col-10 col-md-4 row d-flex justify-content-center">
            <livewire:page.register />
        </div>
        <!--begin::Aside-->
    </div>
</div>
@endsection
