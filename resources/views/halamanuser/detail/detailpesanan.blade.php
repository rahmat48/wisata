@extends('halamanuser.templateuser')

@section('kontenuser')
<div class="container" style="margin-top: 5%; margin-bottom:50%">
    <center><h2>History Pemesanan</h2>
        <hr style="width: 280px;  
        background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
        height: 3px;
        border: none;"></center>
    <div class="row d-flex justify-content-center mx-3" style="margin-top: 5%">
        <div class="card shadow" style="width: 50rem; border:none">
            <div class="card-body">
                <table class="table table-bordered" style="border-width: 3px; border-color:rgba(143, 143, 143, 0.548)">
                    <thead>
                        <tr style="background-color: #6fa8ff">
                            <th><center>Nama</center></th>
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