{{-- <div class=""> --}}
    <video id="preview" wire:ignore></video>
{{-- </div> --}}

@push('css')
    <script src="{{ asset('assets/js/instascan.min.js') }}"></script>
@endpush

@push('js')
    <script type="text/javascript">
    let scanner = new Instascan.Scanner({ 
        continuous: true,
        video: document.getElementById('preview') ,

    });
    scanner.addListener('scan', function (content) {
        Livewire.dispatch('on-scanned', { data: content })
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
        // scanner.start(cameras[0]);
        } else {
        console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
    scanner.stop();
    </script>
@endpush