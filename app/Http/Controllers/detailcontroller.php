<?php

namespace App\Http\Controllers;

use App\Models\beritadesa;
use App\Models\eventdesa;
use App\Models\kulinerdesa;
use App\Models\pakettrip;
use App\Models\pesanan;
use App\Models\wisatadesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class detailcontroller extends Controller
{
    public function detailpesanan(){
        $pesanan = pesanan::where('id_user', Auth::id())->with('user','pakettrip')->get();

        return view('halamanuser.detail.detailpesanan', compact('pesanan'));
    }

    public function detailberita(string $id){
        $detail = beritadesa::findorfail($id);
        return view('halamanuser.detail.detailberita', compact('detail'));
    }
    public function detailwisata(string $id){
        $detail = wisatadesa::findorfail($id);
        return view('halamanuser.detail.detailwisata', compact('detail'));
    }
    public function detailkuliner(string $id){
        $detail = kulinerdesa::findorfail($id);
        return view('halamanuser.detail.detailkuliner', compact('detail'));
    }
    public function detailevent(string $id){
        $detail = eventdesa::findorfail($id);
        return view('halamanuser.detail.detailevent', compact('detail'));
    }
    public function detailtrip(string $id){
        $detail = pakettrip::with('wisata_desa','event_desa','kuliner_desa')->findorfail($id);
        return view('halamanuser.detail.detailpaket', compact('detail'));
    }

    public function pemesanan(){
        $pesanan=pesanan::with('user','pakettrip')->get();
        return view('fituradmin.pesanan', compact('pesanan'));
    }
}
