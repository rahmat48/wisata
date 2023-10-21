@extends('halamanuser.templateuser')

@section('kontenuser')
<header style="background: url({{asset('header/headerberita.jpg')}}); background-position: center center; background-repeat: no repeat">
    <div class="container px-4 text-center">
        <center><h2>Kuliner Desa Wunut</h2>
      <hr style="width: 280px;  
      background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
      height: 3px;
      border: none;"></center>
    </div>
</header>
<div class="container" style="margin-top: 3%">
    <div class="col d-flex justify-content-center mt-5" style="margin-bottom: 2%">
        <div class="row">
            @foreach($kulinerdesa as $item)
            <div class="col" >
                <div class="card shadow" style="width: 18rem;">
                    <img class="card-img-top" style="height: 150px" src="{{ asset('image_kulinerdesa')}}/{{$item->gambar}}" alt="Card image cap">
                    <div class="card-body">
                    <center><h5 class="card-title">{{$item->namatempat}}</h5></center>
                    <p class="card-text" style="text-align: justify">{{ Str::limit($item->deskripsi, '150', '...')}}</p>
                    <center><a href="{{route('detailkuliner',$item->id)}}" class="btn btn-primary">Lebih Lanjut</a></center>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>	
</div>
<div class="container">
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 10rem; margin-bottom: 20px; border:0px">
            <div class="card-body" >
                {{ $kulinerdesa->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection