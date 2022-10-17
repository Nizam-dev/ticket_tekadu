<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\provinsi;

class UserController extends Controller
{
    public function index()
    {
        $provinsis = provinsi::all();
        $users = auth()->user()->role == 'admin' ? User::where('role','!=','admin')->orderBy('id','desc')->get() : User::where('role','owner')->orderBy('id','desc')->get();

        return view('admin.user_management',compact('users','provinsis'));
    }

    public function store(Request $request)
    {
        $user = $request->role == "staff" ? $request->except(['provinsi','kota','instansi','alamat']) : $request->all();

        $user['password'] = bcrypt($request->password);
        if(User::where('email',$request->email)->first() != null){
            return redirect()->back()->with("failed","Email telah terdaftar");
        }
        User::create($user);
        
        return redirect()->back()->with("success","Berhasil Menambahkan User");
    }

    public function update($id, Request $request)
    {
        $user = $request->role == "staff" ? $request->except(['provinsi','kota','instansi','alamat','password']) : $request->except('password');

        if($request->password != null){
            $user['password'] = bcrypt($request->password);
        }
        User::find($id)->update($user);
        return redirect()->back()->with("success","Berhasil Mengedit User");
    }
}
