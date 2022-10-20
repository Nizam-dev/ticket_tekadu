<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use Carbon\Carbon;

class ScanTicketController extends Controller
{
    public function index()
    {
        $events = event::orderBy('id','desc')->withCount(['scan_tiket','tiket'])->get();
        if(auth()->user()->role == 'owner'){
            $events = $events->where('user_id',auth()->user()->id);
        }
        return view('staff.scan_ticket_event',compact('events'));
    }

    public function show($id)
    {
        return view('staff.scan_ticket',compact('id'));
    }

    public function update($id, Request $request)
    {
        $tiket = ticket::where('kode_ticket',$request->kode_ticket)
        ->where('event_id',$id)->first();
        if($tiket){
            return response()->json([
                'status'=>'success',
                'data'=>$tiket,
                'waktu'=> Carbon::now()
            ]);
        }else{
            return response()->json([
                'status'=>'failed',
                'data'=>$tiket,
                'waktu'=> Carbon::now()
            ]);
        }
    }
}
