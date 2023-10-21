<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beritadesa;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class beritadesacontroller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtberitadesa = beritadesa::all();
        return view('fituradmin.beritadesa.beritadesa',compact('dtberitadesa'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fituradmin.beritadesa.beritadesa_insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'date' => 'required',
            'gambar' => 'required',
            'tempat' => 'required',
        ],[
            'judul.required'=>'Judul wajib diisi',
            'isi.required'=>'Detail wajib diisi',
            'date.required'=>'Tanggal wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
            'tempat.required'=>'Tempat wajib diisi',
        ]);

        if ($request->judul==null || $request->isi==null || $request->date==null || $request->gambar==null || $request->tempat==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_berita',$file->getClientOriginalName());

            $berita                 = new beritadesa();
            $berita->judul          = $request->judul;
            $berita->isi            = $request->isi;
            $berita->tglevent       = $request->date;
            $berita->gambar         = $nama_file;
            $berita->tempat         = $request->tempat;
            $berita->save();

            return redirect('beritadesa')->with('success', 'Data Berhasil Tersimpan');;
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
        $editt=beritadesa::findorfail($id);
        return view('fituradmin.beritadesa.beritadesa_edit',compact('editt'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editt=beritadesa::findorfail($id);
        $fileberita = public_path('/image_berita/').$editt->gambar;

        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'date' => 'required',
            'gambar' => 'required',
            'tempat' => 'required',
        ],[
            'judul.required'=>'Judul wajib diisi',
            'isi.required'=>'Detail wajib diisi',
            'date.required'=>'Tanggal wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
            'tempat.required'=>'Tempat wajib diisi',
        ]);

        if ($request->judul==null || $request->isi==null || $request->date==null || $request->gambar==null || $request->tempat==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            if (file_exists($fileberita)){
                @unlink($fileberita);
            }
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_berita',$file->getClientOriginalName());
            

            $berita                 = beritadesa::findorfail($id);
            $berita->judul          = $request->judul;
            $berita->isi            = $request->isi;
            $berita->tglevent       = $request->date;
            $berita->gambar         = $nama_file;
            $berita->tempat         = $request->tempat;
            $berita->save();

            return redirect('beritadesa')->with('success', 'Data Berhasil Diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editt=beritadesa::findorfail($id);
        $fileevent = public_path('/image_berita/').$editt->gambar;
        if (file_exists($fileevent)){
            @unlink($fileevent);
        }
        $editt->delete();
        return redirect('beritadesa')->with('success', 'Data Berhasil Dihapus');
    }
}
