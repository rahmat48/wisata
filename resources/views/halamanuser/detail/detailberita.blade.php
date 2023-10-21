@extends('halamanuser.templateuser')

@section('kontenuser')
    <div class="container" style="margin-top: 8%">
        <center><h2>{{$detail->judul}}</h2>
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
                <center><img class="mr-4 shadow" src="{{ asset('image_berita')}}/{{$detail->gambar}}"
                height="80%" width="80%" style="vertical-align: 100%; margin-top:10%; border-radius:15px"></center>
                </div>
                <div class="col-7">
                    <div class="row" style="margin-top: 7%; margin-right:2%">
                      <h4 style="color:black">Penjelasan Berita</h4>
                    </div>
                    <div class="row" style="margin-right: 2%">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->isi}}</i>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Tanggal Berita</h4>
                    </div>
                        <div class="row">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->tglevent}}</i></center>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Tempat Kejadian</h4>
                    </div>
                        <div class="row" style="margin-bottom: 5%">
                        <i style="color: black; font-style:normal; text-align:justify">{{$detail->tempat}}</i></center>
                    </div>
                    </div>                         
                </div>
                </div>
  
                        <div class="row mt-4">
                        </div>
                </div>
        </div>
@endsection