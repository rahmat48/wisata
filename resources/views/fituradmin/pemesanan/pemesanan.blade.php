@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <center><h1 class="h3 mb-4 text-gray-800">Data Pemesanan</h1></center>
        
    </div>
     <div class="container-fluid shadow mb-4">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <table class="table table-bordered" id="pesanan">
                        <thead>
                            <tr>
                                <th><center>Nama Pemesan</center></th>
                                <th><center>Nama Paket</center></th>
                                <th><center>No. Telepon</center></th>
                                <th><center>Tanggal</center></th>
                                <th><center>Jumlah Pax</center></th>
                                <th><center>Total Harga</center></th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td><center>{{$item->nama}}</center></td>
                                <td><center>{{$item->pakettrip->nama}}</center></td>
                                <td><center>{{$item->notelp}}</center></td>
                                <td><center>{{$item->tanggal}}</center></td>
                                <td><center>{{$item->jumlah}}</center></td>
                                <td><center>Rp. {{$item->total}}</center></td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>          
        </div>
    </div>
@endsection