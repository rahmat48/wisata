@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <center><h1 class="h3 mb-4 text-gray-800">Wisata Desa</h1></center>
        
    </div>
     <div class="container-fluid shadow mb-4">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{route('wisatadesa_insert')}}">Tambah Data <i class="fas fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="wisatadesa">
                        <thead>
                            <tr>
                                <th width="20%"><center>Nama Tempat</center></th>
                                <th width="30%"><center>Deskripsi</center></th>
                                <th width="10%"><center>Lokasi</center></th>
                                <th width="7%"><center>Jam Buka</center></th>
                                <th width="7%"><center>Jam Tutup</center></th>
                                <th width="7%"><center>Harga</center></th>
                                <th width="10%"><center>Gambar</center></th>
                                <th width="15%"><center>Aksi</center></th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($dtwisatadesa as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td  align="justify">{{$item->deskripsi}}</td>
                                <td>{{$item->lokasitempat}}</td>
                                <td>{{$item->jambuka}}</td>
                                <td>{{$item->jamtutup}}</td>
                                <td>Rp.{{$item->harga}}</td>
                                <td  align="center"><img src="{{ asset('image_tempatwisata')}}/{{$item->gambar}}" height="50%" width="50%"></td>
                                <td  style="vertical-align:middle" align="center">
                                    <a href="{{route('wisatadesa_edit',$item->id)}}"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #ffc800;"></i></a>
                                    <i> | </i>
                                    <a href="{{route('wisatadesa_delete',$item->id)}}"><i class="fa-solid fa-trash fa-xl" style="color: #e74a3b;"></i></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                        
                       
                        
                    </table>
                </div>
            </div>          
        </div>
    </div>
@endsection