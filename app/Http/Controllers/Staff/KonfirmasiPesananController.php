<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\ticket;
use App\Mail\MailSendTicket;
use Illuminate\Support\Str;
use App\Mail\MailSendPembayaranDitolak;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KonfirmasiPesananController extends Controller
{
    public function diterima($id)
    {
        $transaksi = transaksi::where('id',$id)->with(['customer','event'])->first();
        if($transaksi->status_pembayaran == "diterima"){
            return redirect()->back();
        }
        for($i=0; $i < $transaksi->total_ticket; $i++) {
            $kode_tiket = $this->genrate_kode_ticket();
            ticket::create([
                'kode_ticket'=> $kode_tiket,
                'type_ticket'=> $transaksi->jenis_ticket,
                'status'=> 'Belum Digunakan',
                'transaksi_id'=> $id,
                'customer_id'=> $transaksi->customer_id,
                'event_id'=> $transaksi->event_id,
            ]);
            QrCode::generate($kode_tiket, public_path('image/qrcode/'.$kode_tiket.'.svg') );
        }

        $transaksi->update(['status_pembayaran'=>'diterima']);

        // Kirim Email
        $details = [
            "nama" => $transaksi->customer->nama,
            "nama_event" => $transaksi->event->nama_event,
            "jumlah_ticket" => $transaksi->total_ticket,
            "kode" => $transaksi->kode_transaksi
        ];

         Mail::to($transaksi->customer->email)->send(new MailSendTicket($details));

        return redirect()->back()->with("success","Berhasil dikonfirmasi, Tiket berhasil dibuat");

    }

    public function ditolak($id)
    {
        $transaksi = transaksi::where('id',$id)->with(['customer','event'])->first();

        $transaksi->update(['status_pembayaran'=>'ditolak']);
        // Kirim Email
        $details = [
            "nama" => $transaksi->customer->nama,
            "nama_event" => $transaksi->event->nama_event,
            "total" => $transaksi->total_pembayaran,
            "kode" => $transaksi->kode_transaksi
        ];

        Mail::to($transaksi->customer->email)->send(new MailSendPembayaranDitolak($details));
        return redirect()->back()->with("success","Berhasil dikonfirmasi, Pembayaran ditolak");
    }

    public function genrate_kode_ticket()
    {

        do {
            $code = strtoupper(Str::random(6));
        } while (ticket::where("kode_ticket", "=", $code)->first());

        return $code;
    }
}
