<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\beritadesa;
use App\Models\eventdesa;
use App\Models\informasidesa;
use App\Models\kulinerdesa;
use App\Models\pakettrip;
use App\Models\pesanan;
use App\Models\wisatadesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class usercontroller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function beritadesa()
    {
        $berita = beritadesa::paginate(2);
        $show =beritadesa::paginate(5);
        return view('halamanuser.beritadesa', compact('berita','show'));
    }

    public function informasidesa()
    {
        $informasidesa = informasidesa::all();
        return view('halamanuser.profile', compact('informasidesa'));
    }
    public function wisata()
    {
        $wisatadesa = wisatadesa::paginate(4);
        return view('halamanuser.wisata', compact('wisatadesa'));
    }
    public function kulinerdesa(){
        $kulinerdesa = kulinerdesa::paginate(4);
        return view('halamanuser.kuliner', compact('kulinerdesa'));
    }

    public function eventdesa()
    {
        $event = eventdesa::paginate(2);
        $show=eventdesa::paginate(5);
        return view('halamanuser.eventdesa', compact('event','show'));
    }

    public function tripdesa()
    {
        $pakettrip = pakettrip::with('wisata_desa','event_desa','kuliner_desa')->paginate(2);
        $pesan = pakettrip::all();
        return view('halamanuser.trip',compact('pakettrip','pesan'));
    }

    public function pesanan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'id_paket' => 'required',
            'notelp' => 'required',
            'jumlah' => 'required',
            'date' => 'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'id_paket.required'=>'Paket Harus Dipilih',
            'notelp.required'=>'Nomer Telepon wajib diisi',
            'jumlah.required'=>'Jumlah wajib diisi',
            'date.required'=>'Tanggal wajib diisi',
        ]);

        if ($request->nama==null || 
        $request->id_paket==null || 
        $request->notelp==null || 
        $request->jumlah==null || 
        $request->date==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            $id_user = Auth::id();
            $harga = pakettrip::find($request->id_paket);
            $total = $harga->harga*$request->jumlah;
                      
            $pesanan           = new pesanan();
            $pesanan->id_paket = $request->id_paket;
            $pesanan->id_user  = $id_user;
            $pesanan->nama     = $request->nama;
            $pesanan->notelp   = $request->notelp;
            $pesanan->tanggal  = $request->date;
            $pesanan->jumlah   = $request->jumlah;
            $pesanan->total    = $total;
            $pesanan->save();

            return redirect('trip')->with('success', 'Terimakasih telah memesan, Data Bisa Dicek di History');
        }
    }
}
