<?php

namespace App\Livewire\Data;

use Exception;
use App\Helpers\Alert;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Helpers\NumberFormatter;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Data\DataRepository;


class Detail extends Component
{
    public $objId;

    #[Validate('required', message: 'Data Harus Diisi', onUpdate: false)]
    public $data;

    public function mount()
    {
        $data = DataRepository::first();
        if ($data) {
            $this->objId = $data->id;

            $this->data = $data->data;
        }
    }

    #[On('on-dialog-confirm')]
    public function onDialogConfirm()
    {
        $this->redirectRoute('data.index');
    }

    #[On('on-dialog-cancel')]
    public function onDialogCancel()
    {
        $this->redirectRoute('data.index');
    }

    public function store()
    {
        $this->validate();

        $validatedData = [
            'data' => $this->data,
        ];

        try {
            DB::beginTransaction();
            if ($this->objId) {
                DataRepository::update($this->objId, $validatedData);
            } else {
                $obj = DataRepository::create($validatedData);
            }

            DB::commit();

            Alert::confirmation(
                $this,
                Alert::ICON_SUCCESS,
                "Berhasil",
                "Akses Berhasil Diperbarui",
                "on-dialog-confirm",
                "on-dialog-cancel",
                "Oke",
                "Tutup",
            );
        } catch (Exception $e) {
            DB::rollBack();
            Alert::fail($this, "Gagal", $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.data.detail');
    }
}
