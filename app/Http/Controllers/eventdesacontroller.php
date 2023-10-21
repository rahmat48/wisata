<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eventdesa;
use App\Http\Controllers\sdtUpload;
use App\Models\pakettrip;
use App\Upload;
use Illuminate\Routing\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;
use Spatie\Backtrace\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class eventdesacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $dteventdesa = eventdesa::all();
        return view('fituradmin.eventdesa.eventdesa',compact('dteventdesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fituradmin.eventdesa.eventdesa_insert');
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
            $file->move('image_event',$file->getClientOriginalName());

            eventdesa::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tglevent' => $request->date,
            'gambar' => $nama_file,
            'tempat' => $request->tempat,
        ]);



            return redirect('eventdesa')->with('success', 'Data Berhasil Tersimpan');;
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
    public function edit($id)
    {
        $editt=eventdesa::findorfail($id);
        return view('fituradmin.eventdesa.eventdesa_edit',compact('editt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editt=eventdesa::findorfail($id);
        $fileevent = public_path('/image_event/').$editt->gambar;

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
            if (file_exists($fileevent)){
                @unlink($fileevent);
            }
            $file=$request->file('gambar');
            $nama_file=$file->getClientOriginalName();
            $file->move('image_event',$file->getClientOriginalName());
            

            $editt->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tglevent' => $request->date,
            'gambar' => $nama_file,
            'tempat' => $request->tempat,
        ]);
            return redirect('eventdesa')->with('success', 'Data Berhasil Diedit');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete=eventdesa::findorfail($id);
        $paket = pakettrip::where('id_event', $delete->id)->first();
        if (!$paket){
            $fileevent = public_path('/image_event/').$delete->gambar;
            if (file_exists($fileevent)){
                @unlink($fileevent);
            }
            $delete->delete();
            return redirect('eventdesa')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('eventdesa')->with('errors', 'Data Terdapat pada Paket!');
        }
        
    }
}
