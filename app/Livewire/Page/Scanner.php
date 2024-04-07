<?php

namespace App\Livewire\Page;

use Exception;
use Carbon\Carbon;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ConcertParticipant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Repositories\Page\ConcertParticipantRepository;

class Scanner extends Component
{
    #[On('on-scanned')]
    public function scanned($data){
        try {
            $id = Crypt::decrypt($data);
            $user = ConcertParticipantRepository::find($id);
            if($user && $user->status == ConcertParticipant::STATUS_REGISTERED){
                $validateData = [
                    'status' => ConcertParticipant::STATUS_SCANNED,
                    'scanned_at' => Carbon::now(),
                ];

                ConcertParticipantRepository::update($user->id, $validateData);

                Alert::success($this, 'Berhasil', "Selamat Datang $user->name, No ID $user->no_ktp");
            }else if($user && $user->status == ConcertParticipant::STATUS_SCANNED){
                Alert::fail($this, 'Gagal', 'Data Sudah Scan');
            }
            else{
                Alert::fail($this, 'Gagal', 'Data Tidak Ditemukan');
            }
        } catch (DecryptException $e) {
            Alert::fail($this, 'Error', 'Failed to decrypt data');
        }
        
    }

    public function render()
    {
        return view('livewire.page.scanner');
    }
}
