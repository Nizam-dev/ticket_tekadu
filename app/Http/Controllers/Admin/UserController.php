<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user()->role == 'admin' ? User::where('role','!=','admin')->orderBy('id','desc')->get() : User::where('role','owner')->orderBy('id','desc')->get();

        return view('admin.user_management',compact('users'));
    }

    public function store(Request $request)
    {
        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        if(User::where('email',$request->email)->first() != null){
            return redirect()->back()->with("failed","Email telah terdaftar");
        }
        User::create($user);
        
        return redirect()->back()->with("success","Berhasil Menambahkan User");
    }

    public function update($id, Request $request)
    {
        $user = $request->except('password');
        if($request->password != null){
            $user['password'] = bcrypt($request->password);
        }
        User::find($id)->update($user);
        return redirect()->back()->with("success","Berhasil Mengedit User");
    }
}
