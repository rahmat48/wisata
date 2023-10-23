@extends('halamanuser.templateuser')

@section('kontenuser')
<div class="container" style="margin-top: 8%">
  <center><h2>Sekilas Tentang Desa Wunut</h2>
      <hr style="width: 280px;  
      background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, #0d6efd));  
      height: 3px;
      border: none;"></center>
</div>
<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:2%">
<!-- Page Heading -->
  <div class="container bg-white text-black shadow mb-5 mt-5" style="border-radius: 20px; width:80%">
    @foreach ($informasidesa as $info)
      <div class="row">
        {{-- gambar --}}
      <div class="col-3 align-self-center">
              <center><img class="mr-4" src="{{ asset('image_informasidesa') }}/{{ $info->gambar }}"
              height="50%" width="50%" style="vertical-align: 5%; margin-top:10%"></center>
              </div>
              <div class="col-8">
                    <div class="row" style="margin-top: 5%">
                        <center><h4 style="color:black">Visi</h4></center>
                        <i style="color: black; font-style:normal; text-align:justify">Visi dari Desa Wunut adalah “Terwujudnya Desa Wunut yang Sejahtera, Dinamis, Religius serta menuju Desa Wisata yang berbasis masyarakat”</i>
                    </div>
                    <div class="row" style="margin-top: 5%">
                        <center><h4 style="color:black">Misi</h4></center>
                        <i style="color: black; font-style:normal; text-align:justify">1.	Meningkatkan kualitas sumber daya manusia yang berbasis iman dan taqwa.</i>
                        <i style="color: black; font-style:normal; text-align:justify">2.	Mewujudkan Pemerintah Desa yang jujur dan berwibawa dengan pengambilan keputusan yang cepat dan tepat.</i>
                        <i style="color: black; font-style:normal; text-align:justify">3.	Meningkatkan kesejahteraan sosial dan ekonomi masyarakat.</i>
                        <i style="color: black; font-style:normal; text-align:justify">4.	Memberikan edukasi keagamaan dari anak-anak sampai orang tua.</i>
                        <i style="color: black; font-style:normal; text-align:justify">5.	Memberikan edukasi bidang pariwisata kepada masyarakat.</i>
                        <i style="color: black; font-style:normal; text-align:justify">6.	Membangun bidang pariwisata sebagai modal untuk peningkatan hasil pertanian dan Usaha Kecil Menengah.</i>
                        <i style="color: black; font-style:normal; text-align:justify">7.	Mengedepankan kejujuran dan musyawarah mufakat dalam kehidupan sehari-hari.</i>
                        <i style="color: black; font-style:normal; text-align:justify">8.	Meningkatkan pembangunan sarana dan prasarana Desa yang memadai.</i>
                        <i style="color: black; font-style:normal; text-align:justify">9.	Meningkatkan peran serta masyarakat melalui gotong royong dalam pembangunan pariwisata dan lainnya.</i>
                        <i style="color: black; font-style:normal; text-align:justify">10.	Mengoptimalkan potensi desa baik sumber daya manusia maupun sumber daya alam.</i>
                    </div>
                  <div class="row" style="margin-top: 5%">
                    <center><h4 style="color:black">Deksripsi Singkat</h4></center>
                  </div>
                  <div class="row">
                      <i style="color: black; font-style:normal; text-align:justify">{{ $info->deskripsi }}</i>
                  </div>
                  <div class="row mt-4">
                      <center><h4 style="color:black">Sejarah Singkat</h4></center>
                  </div>
                      <div class="row">
                      <i style="color: black; font-style:normal; text-align:justify">{{ $info->sejarah }}</i></center>
                  </div>
                  </div>
              </div>
   @endforeach

                      <div class="row mt-4">
                      </div>
              </div>
      </div>
@endsection