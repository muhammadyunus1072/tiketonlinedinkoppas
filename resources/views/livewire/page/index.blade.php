<form wire:submit="store" class="form w-100" novalidate="novalidate">
    @csrf
    
    @if (App\Repositories\Page\ConcertParticipantRepository::is_eligible())
        <div class="d-grid mb-8">
            <a href="{{ route('register') }}" class="btn btn-primary">
                <span class="indicator-label">Daftar Peserta</span>
            </a>
        </div>
    @else

        <div class="alert alert-danger text-center my-5" role="alert">
            Maaf Pendaftaran Sudah Ditutup
        </div>
    @endif

    <div class="fv-row mb-8">
        <h1 class="py-0">Generate QR Code</h1>
    </div>
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="NIK / Kartu Pelajar" wire:model="email" autocomplete="off"
            class="form-control bg-transparent @error('email') is-invalid @enderror" />
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="d-grid mb-8">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            
            <span class="indicator-label">Generate</span>
            <span class="indicator-progress" wire:loading>
                Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            
        </button>
    </div>
</form>
