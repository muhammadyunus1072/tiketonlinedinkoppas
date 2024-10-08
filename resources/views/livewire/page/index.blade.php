<form wire:submit="store" class="form w-100" novalidate="novalidate">
    @csrf

    <div class="fv-row mb-8">
        <h1 class="py-0">Generate QR Code</h1>
    </div>
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Masukkan Kata Kunci" wire:model.blur="no_ktp" autocomplete="off"
            class="form-control bg-transparent @error('no_ktp') is-invalid @enderror" />
        @error('no_ktp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="d-grid mb-8">
        <button type="submit" id="kt_sign_in_submit" class="btn" style="background-color: #c252a5">
            
            <span class="indicator-label text-white">Generate</span>
            <span class="indicator-progress text-white" wire:loading>
                Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            
        </button>
    </div>
</form>
