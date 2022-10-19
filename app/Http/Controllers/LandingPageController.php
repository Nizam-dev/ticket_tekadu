<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\kategori_event;
use Carbon\Carbon;


class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $cari = false;
        $kategori = kategori_event::orderBy('id','DESC')->get();
        $events = event::whereDate('tanggal_mulai', '>=',Carbon::now())
        ->orderBy('id','desc')->with('foto_event')->with('jenis_ticket')->get();

        if($request->all()){
            if($request->nama_event != null){
                $pencarian = $request->nama_event;
            }elseif($request->kategori_event != null){
                $pencarian = $request->kategori_event;
            }elseif($request->tanggal_event != null){
                $pencarian = $request->tanggal_event;
            }else{
                $pencarian = '...............';
            }
            $cari = "Pencarian Event ".$pencarian;

            $events = event::where('nama_event', 'like', '%' . $request->nama_event . '%')
            ->where('kategori_event', 'like', '%' . $request->kategori_event . '%')
            ->orderBy('id','DESC')->get();
            if($request->tanggal_event != null){
                $events = event::where('nama_event', 'like', '%' . $request->nama_event . '%')
                ->where('kategori_event', 'like', '%' . $request->kategori_event . '%')
                ->whereDate('tanggal_mulai', '>=', $request->tanggal_event)
                ->orderBy('id','DESC')->get();
            }
        }
        return view('guest.landing_page',compact('events','kategori','cari'));
    }


    public function about()
    {
        return view('guest.about');
    }
}
