<form wire:submit="store">
    <div class='row'>
        <div class="col-md-6 mb-4">
            <label>Data</label>
            <input type="text" class="form-control @error('data') is-invalid @enderror" wire:model.blur="data" />

            @error('data')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-3">
        <i class='ki-duotone ki-check fs-1'></i>
        Save
    </button>
</form>
