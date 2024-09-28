<div class="row">
    <!--end::Separator-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <textarea class="form-control @error('data') is-invalid @enderror" cols="30" rows="4" wire:model="data">

        </textarea>
        @error('data')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Email-->
    </div>
    
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="button" wire:click="store" id="kt_sign_in_submit" class="btn btn-primary">
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
</div>
