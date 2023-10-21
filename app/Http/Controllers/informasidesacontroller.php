<?php

namespace App\Http\Controllers;

use App\Models\informasidesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class informasidesacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $dtinformasidesa = informasidesa::all();
        return view('fituradmin.informasidesa.informasidesa',compact('dtinformasidesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $editt=informasidesa::findorfail($id);
        return view('fituradmin.informasidesa.update_informasidesa',compact('editt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editt=informasidesa::findorfail($id);
        $fileevent = public_path('/image_informasidesa/').$editt->gambar;

        $this->validate($request, [
            'deskripsi' => 'required',
            'sejarah' => 'required',
            'gambar' => 'required',
        ],[
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'sejarah.required'=>'Sejarah wajib diisi',
            'gambar.required'=>'Gambar wajib diisi',
        ]);
        if ($request->deskripsi==null || $request->sejarah==null || $request->gambar==null) {
            return back()->with('errors', $this->messages()->all()[0])->withInput();
        }
        else{
            if (file_exists($fileevent)){
                @unlink($fileevent);
            }

            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_informasidesa',$file->getClientOriginalName());

            $editt->update([
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'gambar' => $nama_file,
        ]);
            return redirect('informasidesa')->with('success', 'Data Berhasil Tersimpan');;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
