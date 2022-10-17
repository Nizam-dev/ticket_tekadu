<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\transaksi;
use App\Models\ticket;
class TicketController extends Controller
{
    public function index($nama_event,$kode)
    {
        if(!event::where('nama_event',$nama_event)->first()){
            return redirect()->back();
        }

        if(!transaksi::where('kode_transaksi',$kode)->first()){
            return redirect()->back();
        }


        $tickets = ticket::where("transaksi_id",transaksi::where('kode_transaksi',$kode)->first()->id)->with('event')->get();

        return view('guest.ticket',compact('tickets'));
    }
}
