<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_scan_ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'tikcet_id',
        'event_id',
        'tiket'
    ];
}
