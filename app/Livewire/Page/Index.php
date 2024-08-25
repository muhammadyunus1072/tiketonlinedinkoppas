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
use App\Repositories\Page\PesertaCareerFestRepository;
use App\Repositories\Page\ConcertParticipantRepository;

class Index extends Component
{

    public $no_ktp;

    public function render()
    {
        return view('livewire.page.index');
    }

    public function store(){
        $this->validate([
            'no_ktp' => 'required',
        ],
        [
            'no_ktp.required' => 'Kata Kunci Harus Diisi',
            ]
        );
        try {
            $user = PesertaCareerFestRepository::findByNo($this->no_ktp);
            if($user){
                return redirect()->route('generate', ['id' => Crypt::encrypt($user->id)]);
            }
            Alert::fail($this, 'Gagal', 'Data Tidak Ditemukan');
            

        } catch (Exception $e) {
            Alert::fail($this, "Gagal", $e->getMessage());
        }
    }
}
