{{-- <div class=""> --}}
    <video id="preview" wire:ignore></video>
{{-- </div> --}}

@push('css')
    <script src="{{ asset('assets/js/instascan.min.js') }}"></script>
@endpush

@push('js')
    <script type="text/javascript">
        Instascan.Camera.getCameras().then(function (cameras) {
            // Find the back camera
            let backCamera = cameras.find(camera => camera.name.toLowerCase().includes('back'));

            // If back camera found, start scanning with it
            if (backCamera) {
                let scanner = new Instascan.Scanner({ 
                    continuous: true,
                    video: document.getElementById('preview'),
                    refractoryPeriod: 30000,
                });

                scanner.addListener('scan', function (content) {
                    Livewire.dispatch('on-scanned', { data: content });
                });

                scanner.start(backCamera);
            } else {
                console.error('No back camera found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endpush