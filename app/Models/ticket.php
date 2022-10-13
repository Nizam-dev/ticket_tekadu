<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

   protected $fillable = [
    'kode_ticket',
    'type_ticket',
    'status',
    'transaksi_id',
    'customer_id',
    'event_id',
   ];
            
}
