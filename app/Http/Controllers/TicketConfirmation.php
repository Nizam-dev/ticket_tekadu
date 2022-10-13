<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\customer;

class TicketConfirmation extends Controller
{
    public function show()
    {
        if(!session()->has('transaksi')){
            return redirect("/");
        }
        $tr = session()->get('transaksi');
        $transaksi = $tr["transaksi"];
        $customer = $tr["customer"];
        $harga_ticket = $tr['harga_per_ticket'];
        return view('guest.confirmation',compact("customer","transaksi","harga_ticket"));
    }

    public function pembayaran($kode_transaksi)
    {
        $transaksi = transaksi::where("kode_transaksi",$kode_transaksi)->first();
        $customer = customer::find($transaksi->customer_id);
        return view('guest.konfirmasi_pembayaran',compact("customer","transaksi"));
    }

    public function konfirmasi_pembayaran($kode_transaksi, Request $request)
    {
        if($request->has('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $tujuan_upload = public_path('/image/bukti_pembayaran');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
        }

        $transaksi = transaksi::where("kode_transaksi",$kode_transaksi)->first();
        $transaksi->update([
            "status_pembayaran" => "pembayaran",
            "foto_pembayaran"=>$nama_file,
            "nama_bank"=>$request->nama_bank,
            "no_rekening"=>$request->no_rekening
        ]);
        return redirect()->back();
    }
}
