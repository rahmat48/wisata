@extends('homeadmin')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid" >
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header bg-primary text-white">
                    <div class="card-tools">
                        <center><h3>Edit Wisata Desa</h3></center>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('kulinerdesa_post_edit',$editt->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Tempat">
                        </div>
                        <div class="form-group">
                            <textarea id="deskripsi" name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" id="lokasitempat" name="lokasitempat" class="form-control" placeholder="Lokasi Tempat">
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="row" style="margin-right: 1pt">
                                    <div style="width: 10%">
                                        <label for="colFormLabel" style="margin-left: 18pt; margin-top:3pt">Jam Buka</label>
                                    </div>
                                    <div style="width: 90%">
                                        <input type="time" class="form-control" id="colFormLabel" name="jambuka">
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="row" style="margin-right: 1pt">
                                    <div style="width: 10%">
                                        <label for="colFormLabel" style="margin-left: 18pt; margin-top:3pt">Jam Tutup</label>
                                    </div>
                                    <div style="width: 90%">
                                        <input type="time" class="form-control" id="colFormLabel" name="jamtutup">
                                    </div>
                                </div>  
                            </div>
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