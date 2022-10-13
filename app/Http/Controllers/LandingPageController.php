<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\kategori_event;


class LandingPageController extends Controller
{
    public function index()
    {
        $kategori = kategori_event::all();
        $events = event::orderBy('id','desc')->with('foto_event')->with('jenis_ticket')->get();
        return view('guest.landing_page',compact('events','kategori'));
    }
}
