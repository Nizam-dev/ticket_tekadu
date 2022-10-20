<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\provinsi;
use App\Models\customer;
use App\Models\transaksi;
use App\Models\jenis_ticket;
use Illuminate\Support\Str;
use App\Mail\MailSendTransaksi;
use Illuminate\Support\Facades\Mail;

class PesanTicketController extends Controller
{
    public function show($id)
    {
        $provinsi = provinsi::all();
        $event = event::where('id',$id)->with('foto_event')->with('jenis_ticket_sisa')->first();
        return view('guest.pesan_ticket',compact('event','provinsi'));
    }

    public function pesan_ticket($id,Request $request)
    {
            

            $customer = customer::create([
                'nama' =>$request->nama,
                'no_hp' =>$request->no_hp,
                'email' =>$request->email,
                'alamat' =>$request->alamat,
                'provinsi' => provinsi::find($request->provinsi)->name ,
                'kota' =>$request->kota,
            ]);

            $harga_per_ticket = jenis_ticket::find($request->jenis_ticket)->harga;
            $transaksi = transaksi::create([
                'kode_transaksi' => $this->genrate_kode_transaksi(),
                'total_ticket' => $request->total_ticket ,
                'jenis_ticket' => jenis_ticket::find($request->jenis_ticket)->jenis_ticket ,
                'total_pembayaran' => $request->total_ticket * $harga_per_ticket,
                'status_pembayaran' => "belum bayar",
                'customer_id' => $customer->id,
                'event_id' =>$id ,
                'jenis_ticket_id'=> $request->jenis_ticket,
            ]);

            // Kirim Email
            $details = [
                "nama" => $customer->nama,
                "nama_event" => event::find($id)->nama_event,
                "total" => $transaksi->total_pembayaran,
                "transaksi" => $transaksi->kode_transaksi
            ];

             Mail::to($customer->email)->send(new MailSendTransaksi($details));


            return redirect('ticketkonfirmation')->with('transaksi',compact('transaksi','customer','harga_per_ticket'));
    }

    public function genrate_kode_transaksi()
    {

        do {
            $code = Str::random(7);
        } while (transaksi::where("kode_transaksi", "=", $code)->first());

        return $code;
    }
}
