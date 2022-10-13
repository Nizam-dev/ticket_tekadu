<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\jenis_ticket;


class BuatTicketController extends Controller
{
    public function index()
    {
        $events = event::orderBy('id','desc')->with('jenis_ticket')->get();
        if(auth()->user()->role == 'owner'){
            $events = $events->where('user_id',auth()->user()->id);
        }
        return view('staff.tambah_ticket.index',compact('events'));
    }

    public function tambah($id, Request $request)
    {
        $ticket = $request->all();
        $ticket["event_id"] = $id;
        jenis_ticket::create($ticket);
        return redirect()->back()->with("success","Berhasil Menambahkan Jenis Tiket");
    }

    public function ubah($id, Request $request)
    {
        $ticket = $request->all();
        $jenis_ticket = jenis_ticket::find($id);
        $jenis_ticket->update($ticket);
        return redirect()->back()->with("success","Berhasil Mengubah Jenis Tiket");
    }

    public function hapus($id)
    {
        jenis_ticket::find($id)->delete();
        return redirect()->back()->with("success","Berhasil Menghapus Jenis Tiket");
    }

}

