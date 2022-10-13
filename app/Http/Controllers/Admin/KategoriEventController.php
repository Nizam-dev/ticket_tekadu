<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori_event;

class KategoriEventController extends Controller
{
    public function index()
    {
        $kategoris = kategori_event::orderBy('id','DESC')->get();
        return view('admin.kategori_event.index',compact('kategoris'));
    }

    public function store(Request $request)
    {
        kategori_event::create($request->all());
        return redirect()->back()->with("success","Berhasil Menambahkan Kategori");
    }

    public function update($id, Request $request)
    {
        kategori_event::find($id)->update($request->all());
        return redirect()->back()->with("success","Berhasil Mengubah Kategori");
    }

    public function destroy($id)
    {
        kategori_event::find($id)->delete();
        return redirect()->back()->with("success","Berhasil Menghapus Kategori");
    }
}
