@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header bg-primary text-white">
                    <div class="card-tools">
                        <center><h3>Tambah Event Desa</h3></center>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('eventdesa_post')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Event">
                        </div>
                        <div class="form-group">
                            <input type="text" id="tempat" name="tempat" class="form-control" placeholder="Lokasi Event">
                        </div>
                        <div class="form-group">
                            <textarea name="isi" id="isi" class="form-control" placeholder="Penjelasan Event"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" style="padding: 3px">
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