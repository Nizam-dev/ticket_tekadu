<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_ticket',
        'harga',
        'jumlah',
        'event_id',
    ];
}
