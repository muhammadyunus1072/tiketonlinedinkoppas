<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sis\TrackHistory\HasTrackHistory;

class Data extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data',
    ];
}
