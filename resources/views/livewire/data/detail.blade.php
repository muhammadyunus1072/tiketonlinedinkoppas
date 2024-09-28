<form wire:submit="store" class="form w-100" novalidate="novalidate">
    @csrf
   
    <!--end::Separator-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Data" wire:model="data" autocomplete="off"
            class="form-control bg-transparent @error('data') is-invalid @enderror" />
        @error('data')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Email-->
    </div>

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="button" id="kt_sign_in_submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Save</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress" wire:loading>
                Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
</form>
