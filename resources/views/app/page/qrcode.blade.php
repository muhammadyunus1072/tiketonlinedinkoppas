@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

<div class="w-100" style="position: relative;">
    <img class="theme-light-show" style="width: 100vw; position: absolute; left: 0; top: 0;"
    src="{{ asset('files/images/barcode_new.png') }}" alt="" />
    <div class="row d-flex justify-content-center mt-5">
        <!--begin::Aside-->
        <div class="col-10 col-md-4 row d-flex justify-content-center" style="margin-top: 13%;">
            <!--end::Image-->
    
            <div class="d-flex justify-content-center">
                {{$qrCode}}
            </div>
            
            <div class="row d-flex justify-content-center" style="margin-top: 100px;" id="footer">
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
