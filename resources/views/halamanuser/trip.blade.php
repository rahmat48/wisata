@extends('halamanuser.templateuser')

@section('kontenuser')
<header style="background: url({{asset('header/headertrip.jpg')}}); background-position: center center; background-repeat: no repeat">
    <div class="container px-4 text-center">
        <center><h2 class="fw-bolder" style="color: #ffffff">Paket Trip & Pemesanan</h2>
      <hr style="width: 280px;  
      background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #ffffff));  
      height: 3px;
      border: none;"></center>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row d-flex justify-content-center mx-3">
                @foreach ($pakettrip as $item)
                <div class="col-6 mt-5" style="align-items: center">
                    <div class="card mx-auto shadow" style="width: 23rem; margin-bottom:20px">
                        <div class="card-body">
                            <center><h5 class="card-title">{{$item->nama}}</h5></center>
                            <p class="card-text" style="text-align: justify">{{ Str::limit($item->deskripsi, '190', '...')}}</p>
                            <p><b>Destinasi Wisata : </b>{{$item->wisata_desa->nama}}</p>
                            <p><b>Tempat Makan     : </b>{{$item->kuliner_desa->namatempat}}</p>
                            <p><b>Destinasi Wisata : </b>{{$item->event_desa->judul}}</p>
                            <center><b><h3>Rp. {{$item->harga}}</h3></b></center>
                            <center><a href="{{route('detailtrip',$item->id)}}" class="btn btn-primary" style="margin-top: 2%">Lebih Lanjut</a></center>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $pakettrip->links() }} 
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mt-5" style="width: 24rem;">
                <div class="card-body">
                  <center> <h5 class="card-title">PEMESANAN</h5></center> 
                  @if (Route::has('login'))
                    @auth
                    <form action="{{route('pemesanan_post')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        Nama Pemesan
                        <input type="text" name="nama" id="" style="margin-top:4px; margin-bottom:4px" class="form-control" placeholder="Nama Pemesanan" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        Nama Paket
                        <select class="form-control select2" style="width: 100%; margin-top:4px; margin-bottom:4px" name="id_paket" id="id_paket">
                            <option value="">Pilih Nama Event</option>
                            @foreach ($pesan as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Nomer Telepon
                        <input type="number" id="typeNumber" style="margin-top:4px; margin-bottom:4px" class="form-control" name="notelp" placeholder="ex.081244556677"/>  
                    </div>
                    <div class="form-group">
                        Jumlah Paket
                        <input type="number" id="typeNumber" style="margin-top:4px; margin-bottom:4px" class="form-control" name="jumlah" placeholder="ex.4"/>                      
                    </div>
                    <div class="form-group">
                        Tanggal Tujuan
                        <input type="date" id="date" style="margin-top:4px; margin-bottom:4px" name="date" class="form-control">
                    </div>
                    <div class="form group" style="margin-top: 15px">
                        <center><button type="submit" class="btn btn-primary">Memesan</button></center>
                    </div>
                    </form>

                    @else
                    <center><a href="{{ route('login') }}" class="btn btn-primary" style="margin-top: 2%">Login Terlebih Dahulu</a></center>
                    @endauth
                  @endif
                </div>
              </div>
        </div>
    </div>
    
</div>
@endsection