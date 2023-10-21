<?php

namespace App\Http\Controllers;

use App\Models\kulinerdesa;
use App\Models\pakettrip;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class kulinerdesacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $dtkulinerdesa = kulinerdesa::all();
        return view('fituradmin.kulinerdesa.kulinerdesa',compact('dtkulinerdesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fituradmin.kulinerdesa.kulinerdesa_insert');
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
            'gambar'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'lokasitempat.required'=>'Lokasi wajib diisi',
            'jambuka.required'=>'Jam Buka wajib diisi',
            'jamtutup.required'=>'Jam Tutup wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
        ]);

        if ($request->nama==null || 
            $request->deskripsi==null ||
            $request->lokasitempat==null ||
            $request->jambuka==null ||
            $request->jamtutup==null || 
            $request->gambar==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_kulinerdesa',$file->getClientOriginalName());
            
            $kuliner                 = new kulinerdesa();
            $kuliner->namatempat     = $request->nama;
            $kuliner->lokasi         = $request->lokasitempat;
            $kuliner->deskripsi      = $request->deskripsi;
            $kuliner->jambuka        = $request->jambuka;
            $kuliner->jamtutup       = $request->jamtutup;
            $kuliner->gambar         = $nama_file;
            $kuliner->save();

        return redirect('kulinerdesa')->with('success', 'Data Berhasil Tersimpan');
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
        $editt=kulinerdesa::findorfail($id);
        return view('fituradmin.kulinerdesa.kulinerdesa_edit',compact('editt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editt=kulinerdesa::findorfail($id);
        $filekuliner = public_path('/image_kulinerdesa/').$editt->gambar;

        $this->validate($request, [
            'nama'=>'required',
            'deskripsi'=>'required',
            'lokasitempat'=>'required',
            'jambuka'=>'required',
            'jamtutup'=>'required',
            'gambar'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'lokasitempat.required'=>'Lokasi wajib diisi',
            'jambuka.required'=>'Jam Buka wajib diisi',
            'jamtutup.required'=>'Jam Tutup wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
        ]);

        if ($request->nama==null || 
            $request->deskripsi==null || 
            $request->lokasitempat==null || 
            $request->jambuka==null || 
            $request->jamtutup==null || 
            $request->gambar==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            if (file_exists($filekuliner)){
                @unlink($filekuliner);
            }
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_kulinerdesa',$file->getClientOriginalName());

            $kuliner                 = kulinerdesa::findorfail($id);
            $kuliner->namatempat     = $request->nama;
            $kuliner->lokasi         = $request->lokasitempat;
            $kuliner->deskripsi      = $request->deskripsi;
            $kuliner->jambuka        = $request->jambuka;
            $kuliner->jamtutup       = $request->jamtutup;
            $kuliner->gambar         = $nama_file;
            $kuliner->save();

            return redirect('kulinerdesa')->with('success', 'Data Berhasil Diedit');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete=kulinerdesa::findorfail($id);
        $paket = pakettrip::where('id_kuliner', $delete->id)->first();
        if (!$paket){
            $fileevent = public_path('/image_kulinerdesa/').$delete->gambar;
            if (file_exists($fileevent)){
                @unlink($fileevent);
            }
            $delete->delete();
            return redirect('kulinerdesa')->with('success', 'Data Berhasil Dihapus');

        }else{
            return redirect('kulinerdesa')->with('errors', 'Data Terdapat pada Paket!');
        }
    }
}
