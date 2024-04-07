@extends('app.layouts.page')

@section('body-class', 'layout-default layout-login-image')

@section('content')

    <div class="row d-flex justify-content-center mt-5">
        <!--begin::Aside-->
        <div class="col-10 col-md-4 row d-flex justify-content-center">
            <!--end::Image-->
            <div class="d-flex justify-content-center">
                {{$qrCode}}
            </div>
            
            <div class="row d-flex justify-content-center" style="margin-top: 40px;" id="footer">
                <div class="col-md-10 d-grid">
                    <button type="button" onclick="printQR()" class="btn mt-3 btn-block text-white" style="background-color: #00cacd">
                        <i class='ki-duotone ki-check fs-1'></i>
                        Download
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
