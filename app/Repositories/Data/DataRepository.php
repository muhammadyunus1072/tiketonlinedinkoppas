<?php

namespace App\Repositories\Data;

use App\Models\Data;
use App\Repositories\MasterDataRepository;

class DataRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return Data::class;
    }
}
