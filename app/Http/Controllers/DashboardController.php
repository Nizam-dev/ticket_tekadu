<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use App\Models\jenis_ticket;
class DashboardController extends Controller
{
    public function index()
    {
        $event = event::count();
        $tiket = jenis_ticket::sum('jumlah');
        $terjual = ticket::count();
        if(auth()->user()->role == 'owner'){
            $event = event::where('user_id',auth()->user()->id)->count();
            $tiket = jenis_ticket::join('events','events.id','jenis_tickets.event_id')
            ->where('events.user_id',auth()->user()->id)
            ->sum('jenis_tickets.jumlah');
            $terjual = ticket::join('events','events.id','tickets.event_id')
            ->where('events.user_id',auth()->user()->id)
            ->count();
        }

        return view('staff.dashboard',compact('event','terjual','tiket'));
    }
}
