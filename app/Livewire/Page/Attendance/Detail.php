<?php

namespace App\Livewire\Page\Attendance;

use Exception;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Course\CategoryRepository;

class Detail extends Component
{
    public $objId;


    #[Validate('required', message: 'Nama Harus Diisi', onUpdate: false)]
    public $name;



    public function mount()
    {

        if ($this->objId) {
            $category = CategoryRepository::find($this->objId);

            $this->name = $category->name;
        }
    }

    #[On('on-dialog-confirm')]
    public function onDialogConfirm()
    {
        $this->name = "";
    }

    #[On('on-dialog-cancel')]
    public function onDialogCancel()
    {
        $this->redirectRoute('category.index');
    }

    public function store()
    {
        $this->validate();

        $validatedData = [
            'name' => $this->name,
        ];

        try {
            DB::beginTransaction();
            if ($this->objId) {
                CategoryRepository::update($this->objId, $validatedData);
                $category = CategoryRepository::find($this->objId);
            } else {
                $category = CategoryRepository::create($validatedData);
            }
            DB::commit();

            Alert::confirmation(
                $this,
                Alert::ICON_SUCCESS,
                "Berhasil",
                "Kategori Berhasil Diperbarui",
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
        return view('livewire.page.attendance.detail');
    }
}
