@extends('halamanuser.templateuser')
{{-- {{ url('corousel/cr1.jpg')}} --}}
@section('kontenuser')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" style="margin-top: 8%">
            <div class="carousel-indicators">
              	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="border-radius:15px; box-shadow: 0 5px 2px -2px gray;">
              <div class="carousel-item active" style="max-height: 400px !important; ">
                <img src="{{ url('corousel/cr2.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ url('corousel/cr1.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ url('corousel/cr3.jpg')}}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

		<div class="container mt-5">
			<center><h2>Rekomendasi Tempat Wisata </h2>
			<hr style="width: 280px;  
			background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
			height: 3px;
			border: none;"></center>
			<div class="col d-flex justify-content-center mt-5">
				<div class="row">
					@foreach($wisata as $item)
					<div class="col" >
						<div class="card shadow" style="width: 18rem; margin-bottom:5%">
							<img class="card-img-top" style="height: 150px" src="{{ asset('image_tempatwisata')}}/{{$item->gambar}}" 
							alt="Card image cap">
							<div class="card-body">
							<center><h5 class="card-title">{{$item->nama}}</h5></center>
							<p class="card-text" style="text-align: justify">{{ Str::limit($item->deskripsi, '150', '...')}}</p>
							<center><a href="{{route('detailwisata',$item->id)}}" class="btn btn-primary">Lebih Lanjut</a></center>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>	
		</div>
		<div class="container mt-5">
			<center><h2>Rekomendasi Tempat kuliner </h2>
			<hr style="width: 280px;  
			background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
			height: 3px;
			border: none;"></center>
			<div class="col d-flex justify-content-center mt-5">
				<div class="row">
					@foreach($kuliner as $item)
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
		<div class="container mt-5 mb-5">
			<center><h2>Rekomendasi Event </h2>
			<hr style="width: 280px;  
			background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
			height: 3px;
			border: none;"></center>
			<div class="col d-flex justify-content-center mt-5">
				<div class="row">
					@foreach($event as $item)
					<div class="col" >
						<div class="card shadow" style="width: 18rem;">
							<img class="card-img-top" style="height: 150px" src="{{ asset('image_event')}}/{{$item->gambar}}" alt="Card image cap">
							<div class="card-body">
							<center><h5 class="card-title">{{$item->judul}}</h5></center>
							<p class="card-text" style="text-align: justify">{{ Str::limit($item->isi, '150', '...')}}</p>
							<center><a href="{{route('detailevent',$item->id)}}" class="btn btn-primary">Lebih Lanjut</a></center>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>	
		</div>
		
    </div>
@endsection