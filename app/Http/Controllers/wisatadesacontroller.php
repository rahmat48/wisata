<?php

namespace App\Http\Controllers;

use App\Models\pakettrip;
use Illuminate\Http\Request;
use App\Models\wisatadesa;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class wisatadesacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $dtwisatadesa = wisatadesa::all();
        return view('fituradmin.wisatadesa.wisatadesa',compact('dtwisatadesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fituradmin.wisatadesa.wisatadesa_insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama'=>'required',
            'deskripsi'=>'required',
            'lokasitempat'=>'required',
            'jambuka'=>'required',
            'jamtutup'=>'required',
            'harga'=>'required',
            'gambar'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'lokasitempat.required'=>'Lokasi wajib diisi',
            'jambuka.required'=>'Jam Buka wajib diisi',
            'jamtutup.required'=>'Jam Tutup wajib diisi',
            'harga.required'=>'Harga wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
        ]);

        if ($request->nama==null || $request->deskripsi==null || $request->lokasitempat==null || $request->jambuka==null || $request->jamtutup==null || $request->harga==null || $request->gambar==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_tempatwisata',$file->getClientOriginalName());
            
            $wisata                 = new wisatadesa();
            $wisata->nama           = $request->nama;
            $wisata->lokasitempat   = $request->lokasitempat;
            $wisata->deskripsi      = $request->deskripsi;
            $wisata->jambuka        = $request->jambuka;
            $wisata->jamtutup       = $request->jamtutup;
            $wisata->harga          = $request->harga;
            $wisata->gambar         = $nama_file;
            $wisata->save();

        return redirect('wisatadesa')->with('success', 'Data Berhasil Tersimpan');
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
        $editt=wisatadesa::findorfail($id);
        return view('fituradmin.wisatadesa.wisatadesa_edit',compact('editt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editt=wisatadesa::findorfail($id);
        $filewisata = public_path('/image_tempatwisata/').$editt->gambar;

        $this->validate($request, [
            'nama'=>'required',
            'deskripsi'=>'required',
            'lokasitempat'=>'required',
            'jambuka'=>'required',
            'jamtutup'=>'required',
            'harga'=>'required',
            'gambar'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'lokasitempat.required'=>'Lokasi wajib diisi',
            'jambuka.required'=>'Jam Buka wajib diisi',
            'jamtutup.required'=>'Jam Tutup wajib diisi',
            'harga.required'=>'Harga wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
        ]);

        if ($request->nama==null || $request->deskripsi==null || $request->lokasitempat==null || $request->jambuka==null || $request->jamtutup==null || $request->harga==null || $request->gambar==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            if (file_exists($filewisata)){
                @unlink($filewisata);
            }
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_tempatwisata',$file->getClientOriginalName());

            $wisata                 = wisatadesa::findorfail($id);
            $wisata->nama           = $request->nama;
            $wisata->lokasitempat   = $request->lokasitempat;
            $wisata->deskripsi      = $request->deskripsi;
            $wisata->jambuka        = $request->jambuka;
            $wisata->jamtutup       = $request->jamtutup;
            $wisata->harga          = $request->harga;
            $wisata->gambar         = $nama_file;
            $wisata->save();

            return redirect('wisatadesa')->with('success', 'Data Berhasil Diedit');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete=wisatadesa::findorfail($id);
        $paket = pakettrip::where('id_wisata', $delete->id)->first();
        if (!$paket) {
            $fileevent = public_path('/image_tempatwisata/').$delete->gambar;
            if (file_exists($fileevent)){
                @unlink($fileevent);
            }
            $delete->delete();
            return redirect('wisatadesa')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('wisatadesa')->with('errors', 'Data Terdapat pada Paket!');
        }
    }
}
