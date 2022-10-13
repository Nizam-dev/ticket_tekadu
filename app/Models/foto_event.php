<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_event extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_event',
        'event_id',
    ];
}
