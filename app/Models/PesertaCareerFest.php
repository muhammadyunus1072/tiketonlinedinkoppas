<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sis\TrackHistory\HasTrackHistory;

class PesertaCareerFest extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_REGISTERED = "REGISTERED";
    const STATUS_SCANNED = "SCANNED";

    const MAX = 2500;

    protected $fillable = [
        'timestamp',
        'username',
        'name',
        'no_wa',
        'asal_sekolah',
        'status',
        'scanned_at',
    ];
}
