<?php

namespace App\Http\Controllers;

use App\Models\eventdesa;
use App\Models\kulinerdesa;
use App\Models\pakettrip;
use App\Models\wisatadesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class pakettripcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $dtpakettrip = pakettrip::with('wisata_desa','event_desa','kuliner_desa')->get();
        return view('fituradmin.pakettrip.pakettrip',compact('dtpakettrip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = eventdesa::all();
        $wisata = wisatadesa::all();
        $kuliner = kulinerdesa::all();
        return view('fituradmin.pakettrip.pakettrip_insert',compact('event','wisata','kuliner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nama'=>'required',
            'kuliner_id'=>'required',
            'wisata_id'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required'
        ],[
            'nama.required'=>'Nama wajib diisi',
            'kuliner_id.required'=>'Event wajib diisi',
            'wisata_id.required'=>'Wisata wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'harga.required'=>'Harga wajib diisi'
        ]);

        if ($request->nama==null || 
            $request->deskripsi==null ||
            $request->harga == null
            ) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else if($request->wisata_id=='disable value')
        {
            return back()->with('errors', 'wisata wajib diisi');
        }
        else if($request->kuliner_id=='disable value')
        {
            return back()->with('errors', 'kuliner wajib diisi');
        }
        else if($request->event_id=='disable value')
        {
            $trip                 = new pakettrip();
            $trip->nama           = $request->nama;
            $trip->id_wisata      = $request->wisata_id;
            $trip->id_event       = null;
            $trip->id_kuliner     = $request->kuliner_id;
            $trip->deskripsi      = $request->deskripsi;
            $trip->harga          = $request->harga;
            $trip->save();
            return redirect('pakettrip')->with('success', 'Data Berhasil Tersimpan');
        }
        else{
            $trip                 = new pakettrip();
            $trip->nama           = $request->nama;
            $trip->id_wisata      = $request->wisata_id;
            $trip->id_event       = $request->event_id;
            $trip->id_kuliner     = $request->kuliner_id;
            $trip->deskripsi      = $request->deskripsi;
            $trip->harga          = $request->harga;
            $trip->save();

        return redirect('pakettrip')->with('success', 'Data Berhasil Tersimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = eventdesa::all();
        $wisata = wisatadesa::all();
        $kuliner = kulinerdesa::all();
        $editt=pakettrip::with('wisata_desa','event_desa','kuliner_desa')->findorfail($id);
        return view('fituradmin.pakettrip.pakettrip_edit',compact('editt','event','wisata','kuliner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'nama'=>'required',
            'kuliner_id'=>'required',
            'wisata_id'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required'
        ],[
            'nama.required'=>'Nama wajib diisi',
            'kuliner_id.required'=>'Event wajib diisi',
            'wisata_id.required'=>'Wisata wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'harga.required'=>'Harga wajib diisi'
        ]);

        if ($request->nama==null || 
            $request->deskripsi==null ||
            $request->harga == null
            ) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else if($request->wisata_id=='disable value')
        {
            return back()->with('errors', 'wisata wajib diisi');
        }
        else if($request->kuliner_id=='disable value')
        {
            return back()->with('errors', 'kuliner wajib diisi');
        }
        else if($request->event_id=='disable value')
        {
            $trip                 = pakettrip::findorfail($id);
            $trip->nama           = $request->nama;
            $trip->id_wisata      = $request->wisata_id;
            $trip->id_event       = null;
            $trip->id_kuliner     = $request->kuliner_id;
            $trip->deskripsi      = $request->deskripsi;
            $trip->harga          = $request->harga;
            $trip->save();
            return redirect('pakettrip')->with('success', 'Data Berhasil Tersimpan');
        }
        else{
            $trip                 = pakettrip::findorfail($id);
            $trip->nama           = $request->nama;
            $trip->id_wisata      = $request->wisata_id;
            $trip->id_event       = $request->event_id;
            $trip->id_kuliner     = $request->kuliner_id;
            $trip->deskripsi      = $request->deskripsi;
            $trip->harga          = $request->harga;
            $trip->save();

        return redirect('pakettrip')->with('success', 'Data Berhasil Tersimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editt=pakettrip::findorfail($id);
        $editt->delete();
        return redirect('pakettrip')->with('success', 'Data Berhasil Dihapus');
    }
}
