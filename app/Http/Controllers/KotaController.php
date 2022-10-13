<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kota;

class KotaController extends Controller
{
    public function kota($id)
    {
        $kota = kota::where('province_id',$id)->get();
        return response()->json($kota);
    }
}
