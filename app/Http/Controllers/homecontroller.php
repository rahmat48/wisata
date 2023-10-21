<?php

namespace App\Http\Controllers;

use App\Models\eventdesa;
use App\Models\kulinerdesa;
use App\Models\wisatadesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str; 

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisata = wisatadesa::paginate(4);
        $kuliner = kulinerdesa::paginate(4);
        $event = eventdesa::paginate(4);
        
        return view('halamanuser.homeuser', compact('wisata', 'kuliner', 'event'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
