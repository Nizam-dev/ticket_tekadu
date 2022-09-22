<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanTicketController extends Controller
{
    public function index()
    {
        return view('guest.pesan_ticket');
    }
}
