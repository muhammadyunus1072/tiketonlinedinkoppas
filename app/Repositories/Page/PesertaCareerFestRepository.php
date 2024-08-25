<?php

namespace App\Repositories\Page;

use App\Models\PesertaCareerFest;
use App\Repositories\MasterDataRepository;

class PesertaCareerFestRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return PesertaCareerFest::class;
    }

    public static function findByNo($query)
    {
        return PesertaCareerFest::where('username', $query)
        ->orWhere('name', $query)
        ->orWhere('no_wa', $query)
        ->first();
    }

    public static function datatable()
    {
        return PesertaCareerFest::query();
    }

    public static function is_eligible()
    {
        return PesertaCareerFest::count() < PesertaCareerFest::MAX;
    }
}
