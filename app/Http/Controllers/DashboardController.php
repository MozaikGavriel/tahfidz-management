<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Whatsapp; // Pastikan model Whatsapp di-import

class DashboardController extends Controller
{

    public function index()
    {
        $whatsapps = Whatsapp::with('santri')->latest()->take(10)->get();
        return view('admin.dashboard', compact('whatsapps'));
    }   
}
