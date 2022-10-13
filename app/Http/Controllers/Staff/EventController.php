<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\kategori_event;
use App\Models\foto_event;
use Illuminate\Support\Facades\File; 

class EventController extends Controller
{
    public function index()
    {
        $events = event::orderBy('id','desc')->with('foto_event')->get();
        $kategoris = kategori_event::all();
        if(auth()->user()->role == 'owner'){
            $events = $events->where('user_id',auth()->user()->id);
        }
        return view('staff.event.index',compact('events','kategoris'));
    }

    public function store(Request $request)
    {
        $event = $request->all();
        $kategoris = "";
        foreach($request->kategori_event as $key => $kateg){
            if ($key === array_key_first($request->kategori_event)) {
                $kategoris = $kategoris . $kateg;
            }else{
                $kategoris = $kategoris . ",".$kateg;
            }
            
        }

        $event["user_id"] = auth()->user()->id;
        $event["kategori_event"] = $kategoris;
        $event_id = event::create($event);

        foreach ($request->banner_event as $key=>$banner) {
            $file = $banner;
            $tujuan_upload = public_path('/image/banner_event');
            $nama_file = date('d-m-Y-H-i').'-'.$key.' '.$event_id->nama_event.'.'.$banner->extension();
            $file->move($tujuan_upload,$nama_file);
            foto_event::create([
                'foto_event' =>$nama_file,
                'event_id'=>$event_id->id
            ]);
        }

        return redirect()->back()->with("success","Berhasil Menambahkan Event");
    }

    public function update($id, Request $request)
    {
        $event = $request->except('banner_event');;

        $eventlama = event::find($id);
        
        $kategoris = "";
        foreach($request->kategori_event as $key => $kateg){
            if ($key === array_key_first($request->kategori_event)) {
                $kategoris = $kategoris . $kateg;
            }else{
                $kategoris = $kategoris . ",".$kateg;
            }
            
        }
        $event["kategori_event"] = $kategoris;

        $eventlama->update($event);
        if($request->has('banner_event')){

            foreach ($request->banner_event as $key=>$banner) {
                $file = $banner;
                $tujuan_upload = public_path('/image/banner_event');
                $nama_file = date('d-m-Y-H-i').'-'.$key.' '.$eventlama->nama_event.'.'.$banner->extension();
                $file->move($tujuan_upload,$nama_file);
                foto_event::create([
                    'foto_event' =>$nama_file,
                    'event_id'=>$id
                ]);
            }

        }
        
        return redirect()->back()->with("success","Berhasil Mengedit Event");

    }


    public function hapus_foto_banner($id)
    {
        $foto = foto_event::find($id);
        $foto_lama = public_path('/image/banner_event/'.$foto->foto_event);
        
        if(file_exists($foto_lama)){
            File::delete($foto_lama);
        }
        $foto->delete();
 
        return response()->json(["success"=>"Foto berhasil dihapus"]);
    }
}
