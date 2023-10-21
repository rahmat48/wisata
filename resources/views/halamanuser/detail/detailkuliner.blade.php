@extends('halamanuser.templateuser')

@section('kontenuser')
    <div class="container" style="margin-top: 8%">
        <center><h2>{{$detail->namatempat}}</h2>
            <hr style="width: 280px;  
            background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
            height: 3px;
            border: none;"></center>
    </div>
  <!-- Begin Page Content -->
  <div class="container-fluid" style="margin-top:3%; margin-bottom:5%">
    
  <!-- Page Heading -->
    <div class="container bg-white text-black shadow mb-5 mt-5" style="border-radius: 20px; width:80%">
        <div class="row">
          {{-- gambar --}}
        <div class="col-5 align-self-center">
                <center><img class="mr-4 shadow" src="{{ asset('image_kulinerdesa')}}/{{$detail->gambar}}"
                height="80%" width="80%" style="vertical-align: 100%; margin-top:10%; border-radius:15px"></center>
                </div>
                <div class="col-7">
                    <div class="row" style="margin-top: 6%; margin-right:2%">
                      <h4 style="color:black">Seputar Tempat Wisata</h4>
                    </div>
                    <div class="row" style="margin-right: 2%">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->deskripsi}}</i>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Jam Buka</h4>
                    </div>
                        <div class="row">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->jambuka}}</i></center>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Jam Tutup</h4>
                    </div>
                        <div class="row">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->jamtutup}}</i></center>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Alamat Tempat Wisata</h4>
                    </div>
                        <div class="row" style="margin-bottom: 5%">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->lokasi}}</i></center>
                    </div>
                    </div>                         
                </div>
                </div>
  
                        <div class="row mt-4">
                        </div>
                </div>
        </div>
@endsection