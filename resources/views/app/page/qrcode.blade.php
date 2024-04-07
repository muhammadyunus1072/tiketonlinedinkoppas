@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

    <div class="row d-flex justify-content-center mt-5">
        <!--begin::Aside-->
        <img class="theme-light-show" style="width: 100vw; left: 0; top: 0;"
        src="{{ asset('files/images/header.jpeg') }}" alt="" />

        <div class="col-10 col-md-4 row d-flex justify-content-center">
            <!--end::Image-->

            <h1 class="text-gray-800 fs-2qx fw-bold text-center">
                Saat Penukaran tiket diharapkan membawa KTP / Kartu Pelajar ASLI
            </h1>
            <div class="d-flex justify-content-center">
                {{$qrCode}}
            </div>
            
            <div class="row d-flex justify-content-center" style="margin-top: 40px;" id="footer">
                <div class="col-md-10 d-grid">
                    <button type="button" onclick="printQR()" class="btn mt-3 btn-block text-white" style="background-color: #00cacd">
                        DOWNLOAD
                    </button>
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
