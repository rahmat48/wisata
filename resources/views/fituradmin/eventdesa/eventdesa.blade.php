@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <center><h1 class="h3 mb-4 text-gray-800">Event Desa</h1></center>
        
    </div>
     <div class="container-fluid shadow mb-4">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{route('eventdesa_insert')}}">Tambah Data <i class="fas fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="eventdesa">
                        <thead>
                            <tr>
                                <th><center>Judul</center></th>
                                <th><center>Isi Event</center></th>
                                <th><center>Lokasi</center></th>
                                <th><center>TglEvent</center></th>
                                <th><center>Gambar</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($dteventdesa as $item)
                            <tr>
                                <td width="20%">{{$item->judul}}</td>
                                <td width="30%" align="justify">{{$item->isi}}</td>
                                <td width="15%">{{$item->tempat}}</td>
                                <td width="10%">{{date('d-m-y', strtotime($item->tglevent))}}</td>
                                <td width="15%" align="center"><img src="{{ asset('image_event')}}/{{$item->gambar}}" height="50%" width="50%"></td>
                                <td width="8%" style="vertical-align:middle" align="center">
                                    <a href="{{route('eventdesa_edit',$item->id)}}"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #ffc800;"></i></a>
                                    <i> | </i>
                                    <a href="{{route('eventdesa_delete',$item->id)}}"><i class="fa-solid fa-trash fa-xl" style="color: #e74a3b;"></i></a>
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