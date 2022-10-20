<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_event',
        'type_event',
        'deskripsi',
        'bentuk_kegiatan',
        'kategori_event',
        'lokasi',
        'latitude',
        'longitude',
        'tanggal_mulai',
        'tanggal_berakhir',
        'jam_mulai',
        'jam_berakhir',
        'user_id'
    ];

    protected $dates = ['tanggal_mulai','tanggal_berakhir'];

    public function foto_event(){
    	return $this->hasMany(foto_event::class);
    }

    public function jenis_ticket(){
    	return $this->hasMany(jenis_ticket::class);
    }

    public function tiket(){
        return $this->hasMany(ticket::class);
    }

    public function scan_tiket(){
        return $this->hasMany(history_scan_ticket::class);
    }

}
