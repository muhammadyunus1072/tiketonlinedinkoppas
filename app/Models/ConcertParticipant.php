<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sis\TrackHistory\HasTrackHistory;

class ConcertParticipant extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_REGISTERED = "REGISTERED";
    const STATUS_SCANNED = "SCANNED";

    const MAX = 2;

    protected $fillable = [
        'name',
        'email',
        'no_ktp',
        'no_telp',
        'alamat',
        'status',
        'scanned_at',
    ];
}
