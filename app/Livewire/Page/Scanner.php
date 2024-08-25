<?php

namespace App\Livewire\Page;

use Exception;
use Carbon\Carbon;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\PesertaCareerFest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Repositories\Page\PesertaCareerFestRepository;

class Scanner extends Component
{
    #[On('on-scanned')]
    public function scanned($data){
        try {
            $id = Crypt::decrypt($data);
            $user = PesertaCareerFestRepository::find($id);
            if($user && $user->status == PesertaCareerFest::STATUS_REGISTERED){
                $validateData = [
                    'status' => PesertaCareerFest::STATUS_SCANNED,
                    'scanned_at' => Carbon::now(),
                ];

                PesertaCareerFestRepository::update($user->id, $validateData);

                Alert::success($this, 'Berhasil', "Selamat Datang $user->name, No ID $user->no_ktp");
            }else if($user && $user->status == PesertaCareerFest::STATUS_SCANNED){
                Alert::fail($this, 'Gagal', 'Data Sudah Scan');
            }
            else{
                Alert::fail($this, 'Gagal', 'Data Tidak Ditemukan');
            }
        } catch (DecryptException $e) {
            Alert::fail($this, 'Gagal', 'Data Tidak Ditemukan');
        }
        
    }

    public function render()
    {
        return view('livewire.page.scanner');
    }
}
