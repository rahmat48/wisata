@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header bg-primary text-white">
                    <div class="card-tools">
                        <center><h3>Tambah Trip Desa</h3></center>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('pakettrip_post')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Paket">
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%" name="event_id" id="event_id">
                            <option value="disable value">Pilih Nama Event</option>
                            @foreach ($event as $item1)
                            <option value="{{$item1->id}}">{{$item1->judul}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%" name="wisata_id" id="event_id">
                            <option value="disable value">Pilih Nama Wisata</option>
                            @foreach ($wisata as $item2)
                            <option value="{{$item2->id}}">{{$item2->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%" name="kuliner_id" id="event_id">
                            <option value="disable value">Pilih Nama Kuliner</option>
                            @foreach ($kuliner as $item3)
                            <option value="{{$item3->id}}">{{$item3->namatempat}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Trip Wisata"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" id="typeNumber" class="form-control" name="harga" placeholder="Harga Paket"/>
                        </div>
                        <div class="form group" style="margin-top: 10px">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>          
        </div>
    </div>
@endsection