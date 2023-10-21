@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header bg-primary text-white">
                    <div class="card-tools">
                        <center><h3>Edit Deskripsi Desa</h3></center>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('informasidesa_post_edit',$editt->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="deskripsi" id="deskripsi" class="form-control">{{$editt->deskripsi}}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="sejarah" id="sejarah" class="form-control">{{$editt->sejarah}}</textarea>
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