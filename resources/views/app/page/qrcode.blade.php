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
        <div class="title" style="margin-bottom: 40px;">
            <p class="text-center text-info fw-bold fs-5 py-3 fw-bold primary-text">
                Screenshot QR Code Untuk Digunakan
                <br><span>Mengisi Daftar Hadir Saat Acara Berlangsung</span>
            </p>
        </div>
        <div class="d-flex justify-content-center">
            {{$qrCode}}
        </div>
        
        <div class="row d-flex justify-content-center" style="margin-top: 40px;" id="footer">
            <div class="col-md-10 d-grid">
                <button type="button" onclick="printQR()" class="btn btn-success mt-3 btn-block">
                    <i class='ki-duotone ki-check fs-1'></i>
                    Simpan
                </button>
                <a type="button" href="{{ route('index') }}" class="btn btn-warning text-dark mt-3 btn-block">
                    <i class="ki-duotone ki-arrow-left fs-2 text-dark">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <!--begin::Aside-->
</div>
@endsection

@push('js')
    <script>
        function printQR(){
            $('#footer').toggleClass('d-none');
            window.print();
        }
    </script>
@endpush
