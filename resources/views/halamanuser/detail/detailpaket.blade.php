@extends('halamanuser.templateuser')

@section('kontenuser')
    <div class="container" style="margin-top: 5%">
        <center><h2>{{$detail->nama}}</h2>
            <hr style="width: 280px;  
            background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
            height: 3px;
            border: none;"></center>
    </div>
  <!-- Begin Page Content -->
    
  <!-- Page Heading -->
  <div class="row d-flex justify-content-center mx-3" style="margin-top: 3%; margin-bottom:5%">
    <div class="card shadow" style="width: 50rem; border:none">
        <div class="card-body">
            <div class="row">
                {{-- gambar --}}
                      <div class="col">
                          <div class="row" style="margin-top: 2%;">
                            <h5 style="color:black">Seputar Paket Wisata</h5>
                          </div>
                          <div class="row" style="margin-right: 2%">
                              <i style="color: black; font-style:normal; text-align:justify">{{$detail->deskripsi}}</i>
                          </div>
                          <div class="row mt-4">
                              <h5 style="color:black">Tempat Wisata</h5>
                          </div>
                              <div class="row">
                              <i style="color: black; font-style:normal; text-align:justify">{{$detail->wisata_desa->nama}}</i></center>
                          </div>
                          <div class="row mt-4">
                              <h5 style="color:black">Event dan Kegiatan</h5>
                          </div>
                              <div class="row">
                              <i style="color: black; font-style:normal; text-align:justify">{{$detail->event_desa->judul}}</i></center>
                          </div>
                          <div class="row mt-4">
                              <h5 style="color:black">Tempat Rumah Makan</h5>
                          </div>
                              <div class="row">
                              <i style="color: black; font-style:normal; text-align:justify">{{$detail->kuliner_desa->namatempat}}</i></center>
                          </div>
                          <div class="row mt-4">
                              <h5 style="color:black">Harga Paket</h5>
                          </div>
                              <div class="row">
                              <i style="color: black; font-style:normal; text-align:justify">Rp. {{$detail->harga}}</i></center>
                          </div>
                      </div>                         
              </div>
        </div>
    </div>
    </div>
@endsection