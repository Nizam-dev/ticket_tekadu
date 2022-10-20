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

   public function event(){
        return $this->belongsTo(event::class,'event_id');
    }

    public function history_scan(){
        return $this->hasMany(history_scan_ticket::class);
    }
            
}
