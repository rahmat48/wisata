@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid" >
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header bg-primary text-white">
                    <div class="card-tools">
                        <center><h3>Edit Berita Desa</h3></center>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('beritadesa_post_edit',$editt->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Berita" value="{{$editt->judul}}">
                        </div>
                        <div class="form-group">
                            <input type="text" id="judul" name="tempat" class="form-control" placeholder="Lokasi Berita" value="{{$editt->tempat}}">
                        </div>
                        <div class="form-group">
                            <textarea name="isi" id="isi" class="form-control" placeholder="Penjelasan Berita">{{$editt->isi}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" id="date" name="date" class="form-control" value="{{$editt->tglevent}}">
                        </div>
                        <div class="form-group">
                            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" style="padding: 3px">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>          
        </div>
    </div>
@endsection