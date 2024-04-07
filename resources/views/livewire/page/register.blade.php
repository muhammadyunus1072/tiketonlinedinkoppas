<div class="w-100">
    <form wire:submit="store">
        @csrf
        <div class="w-100 mb-10">
            <div class="h1 text-center">Daftar Peserta Konser</div>
        </div>
        <div class='row d-flex justify-content-center'>
            <div class="col-md-10 mb-4">
                <label class="form-label fs-3" for="name">Nama Sesuai KTP / Kartu Pelajar</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.blur="name" placeholder="Nama" />
    
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-10 mb-4">
                <label class="form-label fs-3" for="email">Email</label>
                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" wire:model.blur="email" placeholder="Email" />
    
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-10 mb-4">
                <label class="form-label fs-3" for="no_ktp">No KTP / Kartu Pelajar</label>
                <input type="text" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" wire:model.blur="no_ktp" placeholder="No Identitas" />
    
                @error('no_ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-10 mb-4">
                <label class="form-label fs-3" for="no_telp">No Telp</label>
                <input type="number" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" wire:model.blur="no_telp" placeholder="Nomor Telephone" />
    
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-10 mb-4">
                <label class="form-label fs-3" for="alamat">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="4" wire:model.blur="alamat" placeholder="Alamat Tinggal" ></textarea>
    
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-10 d-grid">
                <button type="submit" class="btn btn-success mt-3 btn-block">
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
    
    </form>
</div>
