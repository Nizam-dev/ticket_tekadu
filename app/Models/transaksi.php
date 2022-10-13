<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'kode_transaksi',
        'total_pembayaran',
        'jenis_ticket',
        'total_ticket',
        'foto_pembayaran',
        'nama_bank',
        'no_rekening',
        'status_pembayaran',
        'customer_id',
        'event_id',
    ];
}
