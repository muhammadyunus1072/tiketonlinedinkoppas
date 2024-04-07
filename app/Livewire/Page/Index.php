<?php

namespace App\Livewire\Page;

use Exception;
use App\Helpers\Alert;
use App\Helpers\PermissionHelper;
use App\Repositories\Account\PermissionRepository;
use App\Repositories\Account\RoleRepository;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Index extends Component
{

    public function render()
    {
        return view('livewire.page.index');
    }
}
