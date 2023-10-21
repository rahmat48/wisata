@extends('homeadmin')

@section('content')
  <link rel="stylesheet" href="style.css">
  <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="text-align: center; font-weight:bold">Informasi Desa</h1>
    <div class="container bg-white text-black shadow mb-4" style="border-radius: 20px">
      @foreach ($dtinformasidesa as $info)
        <div class="row">
          {{-- gambar --}}
        <div class="col-3 align-self-center">
        		<center><img class="mr-4" src="{{ asset('image_informasidesa') }}/{{ $info->gambar }}"
                height="50%" width="50%" style="vertical-align: 5%; margin-top:15%"></center>
                </div>
                <div class="col-8">
                    <div class="row" style="margin-top: 5%">
                        <h4 style="color:black">Deksripsi Singkat</h4>
                    </div>
                    <div class="row">
                        <i style="color: black; font-style:normal; text-align:justify">{{ $info->deskripsi }}</i>
                    </div>
                    <div class="row mt-4">
                        <h4 style="color:black">Sejarah Singkat</h4>
                    </div>
                        <div class="row">
                        <i style="color: black; font-style:normal; text-align:justify">{{ $info->sejarah }}</i>
                    </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 2%;">
                    <a href="{{ route('informasidesa_edit', $info->id) }}" type="button" class="btn btn-warning"
                        style="background-color: rgb(255, 196, 0); color:rgb(255, 255, 255); border-color: rgba(255, 0, 0, 0);" ">Sunting</a>
                    </div>
     @endforeach

                        <div class="row mt-4">
                        </div>
                </div>
        </div>
        <!-- /.container-fluid -->
    @endsection
