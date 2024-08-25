<?php

namespace App\Livewire\Page\Attendance;

use Carbon\Carbon;
use App\Helpers\Alert;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\WithDatatable;
use App\Helpers\PermissionHelper;
use App\Models\PesertaCareerFest;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Account\UserRepository;
use App\Repositories\Course\CategoryRepository;
use App\Repositories\Page\PesertaCareerFestRepository;

class Datatable extends Component
{
    use WithDatatable;

    public $isCanUpdate;
    public $isCanDelete;

    // Delete Dialog
    public $targetDeleteId;

    public function onMount()
    {
        $authUser = UserRepository::authenticatedUser();
        $this->isCanUpdate = $authUser->hasPermissionTo(PermissionHelper::transform(PermissionHelper::ACCESS_ATTENDANCE, PermissionHelper::TYPE_UPDATE));
        $this->isCanDelete = $authUser->hasPermissionTo(PermissionHelper::transform(PermissionHelper::ACCESS_ATTENDANCE, PermissionHelper::TYPE_DELETE));
    }

    #[On('on-delete-dialog-confirm')]
    public function onDialogDeleteConfirm()
    {
        if (!$this->isCanDelete || $this->targetDeleteId == null) {
            return;
        }

        PesertaCareerFestRepository::delete($this->targetDeleteId);
        Alert::success($this, 'Berhasil', 'Data berhasil dihapus');
    }

    #[On('on-delete-dialog-cancel')]
    public function onDialogDeleteCancel()
    {
        $this->targetDeleteId = null;
    }

    public function showDeleteDialog($id)
    {
        $this->targetDeleteId = $id;

        Alert::confirmation(
            $this,
            Alert::ICON_QUESTION,
            "Hapus Data",
            "Apakah Anda Yakin Ingin Menghapus Data Ini ?",
            "on-delete-dialog-confirm",
            "on-delete-dialog-cancel",
            "Hapus",
            "Batal",
        );
    }

    public function getColumns(): array
    {
        $columns = [
            [
                'key' => 'no_ktp',
                'name' => 'No Identitas',
            ],
            [
                'key' => 'name',
                'name' => 'Nama',
            ],
            [
                'key' => 'email',
                'name' => 'Email',
            ],
            [
                'key' => 'no_telp',
                'name' => 'Nomor Telp',
            ],
            [
                'key' => 'status',
                'name' => 'Status',
                'render' => function($item){
                    $class = $item->status == PesertaCareerFest::STATUS_SCANNED ? 'success' : 'info';
                    
                    return "<div class='badge badge-$class' style='font-size:15px;'>$item->status</div>";
                }
            ],
            [
                'key' => 'scanned_at',
                'name' => 'Status',
                'render' => function($item){
                    return ($item->scanned_at) ? Carbon::parse($item->scanned_at)->format('d F Y H:i:s') : "-";
                }
            ],
            [
                'key' => 'alamat',
                'name' => 'alamat',
            ],
            [
                'name' => 'Action',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $destroyHtml = "";
                    if ($this->isCanDelete) {
                        $destroyHtml = "<div class='col-auto mb-2'>
                            <button class='btn btn-danger btn-sm m-0' 
                                wire:click=\"showDeleteDialog($item->id)\">
                                <i class='ki-duotone ki-trash fs-1'>
                                    <span class='path1'></span>
                                    <span class='path2'></span>
                                    <span class='path3'></span>
                                    <span class='path4'></span>
                                    <span class='path5'></span>
                                </i>
                                Hapus
                            </button>
                        </div>";
                    }

                    $html = "<div class='row'>
                        $destroyHtml 
                    </div>";

                    return $html;
                },
            ],
        ];

        return $columns;
    }

    public function getQuery(): Builder
    {
        return PesertaCareerFestRepository::datatable();
    }

    public function getView(): string
    {
        return 'livewire.page.attendance.datatable';
    }
}
