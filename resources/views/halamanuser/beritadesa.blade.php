@extends('halamanuser.templateuser')

@section('kontenuser')
<header style="background: url({{asset('header/headerberita.jpg')}}); background-position: center center; background-repeat: no repeat">
    <div class="container px-4 text-center">
        <center><h2>Berita di Desa Wunut </h2>
			<hr style="width: 280px;  
			background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
			height: 3px;
			border: none;"></center>
    </div>
</header>
<div class="container">
    <div class="row">  
        <div class="col-8">
            <div class="row d-flex justify-content-center mx-3">
                @foreach ($berita as $item)
                <div class="col-6 mt-5" style="align-items: center">
                    <div class="card mx-auto shadow" style="width: 23rem; margin-bottom:20px">
                        <img class="card-img-top" style="height: 220px" src="{{ asset('image_berita')}}/{{$item->gambar}}" alt="Card image cap">
                        <div class="card-body">
                            <center><h5 class="card-title">{{$item->judul}}</h5></center>
                            <p class="card-text" style="text-align: justify">{{ Str::limit($item->isi, '150', '...')}}</p>
                            <p><b>Tanggal Berita : </b>{{$item->tglevent}}</p>
                            <center><a href="{{route('detailberita',$item->id)}}" class="btn btn-primary">Lebih Lanjut</a></center>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $berita->links() }} 
            </div>
          
            
        </div>
        
        <div class="col-4">
            <div class="row mt-5">
                <div class="card mx-auto shadow" style="width: 18rem;">
                    <div class="card-body">
                        <center><h4>Pencarian</h4></center>
                        <div class="input-group mb-3">
                            <input type="search" name="search_berita" id="search_berita" value="" class="form-control" aria-label="Username">
                            <div class="input-group-append">
                              <span class="input-group-text" style="background-color: #0d6efd"><div><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></div></span>
                            <div id="countryList">
                            </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="card mx-auto shadow" style="width: 18rem; margin-bottom: 20px">
                    <div class="card-body" >
                        <center><h4 style="margin-bottom: 6%">Berita Desa Terbaru</h4></center>
                        @foreach ($show as $item)
                        <div style="margin-bottom:7px; margin-top:2%">
                            <a href="{{route('detailberita',$item->id)}}" style="text-decoration:none; color:black;">{{ Str::limit($item->judul, '50', '...')}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection
