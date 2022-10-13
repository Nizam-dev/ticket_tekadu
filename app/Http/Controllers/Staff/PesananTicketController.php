<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class PesananTicketController extends Controller
{
    public function index()
    {
        $transaksis = transaksi::join('customers','customers.id','transaksis.customer_id')
        ->join('events','events.id','transaksis.event_id')
        ->select('transaksis.*','customers.nama','events.nama_event')
        ->where('status_pembayaran','pembayaran')
        ->get();
        return view('staff.pesanan_ticket.index',compact('transaksis'));
    }
}
