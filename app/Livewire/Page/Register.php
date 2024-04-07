<?php

namespace App\Livewire\Page;

use Exception;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Helpers\PermissionHelper;
use Livewire\Attributes\Validate;
use App\Models\ConcertParticipant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Page\ConcertParticipantRepository;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Account\PermissionRepository;

class Register extends Component
{
    public $name;
    public $email;
    public $no_ktp;
    public $no_telp;
    public $alamat;

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'no_ktp' => 'required|min:6|unique:concert_participants,no_ktp',
            'no_telp' => 'required',
            'alamat' => 'required',
        ],
        [
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Email Format Tidak Sesuai',
            'no_ktp.required' => 'No KTP / Kartu Pelajar Harus Diisi',
            'no_ktp.min' => 'No KTP / Kartu Pelajar Minimal 6 karakter',
            'no_ktp.unique' => 'No KTP / Kartu Pelajar Sudah Terdaftar',
            'no_telp.required' => 'Nomor Telephone Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            ]
        );
        try {
            DB::beginTransaction();

            $validateData = [
                'name' => $this->name,
                'email' => $this->email,
                'no_ktp' => $this->no_ktp,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
                'status' => ConcertParticipant::STATUS_REGISTERED,
            ];

            $user = ConcertParticipantRepository::create($validateData);
            DB::commit();

            return redirect()->route('generate', ['id' => Crypt::encrypt($user->id)]);
        } catch (Exception $e) {
            DB::rollBack();
            Alert::fail($this, "Gagal", $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.page.register');
    }
}
