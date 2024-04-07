<?php

namespace App\Repositories\Page;

use App\Models\ConcertParticipant;
use App\Repositories\MasterDataRepository;

class ConcertParticipantRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return ConcertParticipant::class;
    }

    public static function findByEmail($email)
    {
        return ConcertParticipant::whereEmail($email)->first();
    }

    public static function datatable()
    {
        return ConcertParticipant::query();
    }

    public static function is_eligible()
    {
        return ConcertParticipant::count() < ConcertParticipant::MAX;
    }
}
