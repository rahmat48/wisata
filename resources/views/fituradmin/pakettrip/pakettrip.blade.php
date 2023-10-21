@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <center><h1 class="h3 mb-4 text-gray-800">Data Trip Paket Wisata</h1></center>
        
    </div>
     <div class="container-fluid shadow mb-4">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{route('pakettrip_insert')}}">Tambah Data <i class="fas fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="pakettrip">
                        <thead>
                            <tr>
                                <th ><center>Nama Tempat</center></th>
                                <th ><center>Deskripsi</center></th>
                                <th ><center>Nama Wisata</center></th>
                                <th ><center>Nama Event</center></th>
                                <th ><center>Nama Kuliner</center></th>            
                                <th ><center>Harga</center></th>
                                <th width="7%"><center>Aksi</center></th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($dtpakettrip as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td  align="justify">{{$item->deskripsi}}</td>
                                <td>{{$item->wisata_desa ? $item->wisata_desa->nama : ''}}</td>
                                <td>{{$item->event_desa ? $item->event_desa->judul : ''}}</td>
                                <td>{{$item->kuliner_desa ? $item->kuliner_desa->namatempat : ''}}</td>
                                
                                <td>Rp.{{$item->harga}}</td>
                                <td  style="vertical-align:middle" align="center">
                                    <a href="{{route('pakettrip_edit',$item->id)}}"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #ffc800;"></i></a>
                                    <i> | </i>
                                    <a href="{{route('pakettrip_delete',$item->id)}}"><i class="fa-solid fa-trash fa-xl" style="color: #e74a3b;"></i></a>
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