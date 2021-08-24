<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Jenis_pesanan;
use App\Models\JenisBarang;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = Costumer::count();
        $barang = JenisBarang::count();
        $pesanan = Jenis_pesanan::count();
        
        // dd($barang);
        return view('Home.dashboard', compact('customer','barang','pesanan'));
    }
}

