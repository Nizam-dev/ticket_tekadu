<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use App\Models\history_scan_ticket;
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
        ->where('event_id',$id)->with('history_scan')->first();
        $event = event::find($id);
        if($tiket){

            if($event->type_event == "berulang"){
                $hs = history_scan_ticket::where('tiket',$request->kode_ticket)->whereDate('created_at',Carbon::now())->get();
                if($hs->isEmpty()){
                    history_scan_ticket::create([
                        'tiket'=>$request->kode_ticket,
                        'event_id'=>$id,
                        'ticket_id'=>$tiket->id
                    ]);
        
                    return response()->json([
                        'status'=>'success',
                        'data'=>$tiket,
                        'waktu'=> Carbon::now()
                    ]);
                }else{
                    return response()->json([
                        'status'=>'duplikat',
                        'data'=>$tiket,
                        'waktu'=> Carbon::now()
                    ]);
                }
            }else{

                if(!$tiket->history_scan->isEmpty()){
                    return response()->json([
                        'status'=>'duplikat',
                        'data'=>$tiket,
                        'waktu'=> Carbon::now()
                    ]);
                }
    
                history_scan_ticket::create([
                    'tiket'=>$request->kode_ticket,
                    'event_id'=>$id,
                    'ticket_id'=>$tiket->id
                ]);
    
                return response()->json([
                    'status'=>'success',
                    'data'=>$tiket,
                    'waktu'=> Carbon::now()
                ]);

            }

        }else{
            return response()->json([
                'status'=>'failed',
                'data'=>$tiket,
                'waktu'=> Carbon::now()
            ]);
        }
    }
}
