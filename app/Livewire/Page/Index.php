<?php

namespace App\Livewire\Page;

use Exception;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Helpers\PermissionHelper;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Account\RoleRepository;
use App\Repositories\Account\PermissionRepository;
use App\Repositories\Page\ConcertParticipantRepository;

class Index extends Component
{

    public $no_tkp;

    public function render()
    {
        return view('livewire.page.index');
    }

    public function store(){
        $this->validate([
            'no_ktp' => 'required|min:6',
        ],
        [
            'no_ktp.required' => 'No KTP / Kartu Pelajar Harus Diisi',
            'no_ktp.min' => 'No KTP / Kartu Pelajar Minimal 6 karakter',
            ]
        );
        try {

            $validateData = [
                'no_ktp' => $this->no_ktp,
            ];

            $user = ConcertParticipantRepository::findByNo($validateData);
            if($user){
                return redirect()->route('generate', ['id' => Crypt::encrypt($user->id)]);
            }
            Alert::fail($this, 'Gagal', 'Data Tidak Ditemukan');
            

        } catch (Exception $e) {
            Alert::fail($this, "Gagal", $e->getMessage());
        }
    }
}
