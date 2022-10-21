@extends('layouts/index')


@section('container') 

<div class="site-blocks-cover overlay bg-light" style="background-image: url('assets/images/bg3.jpg'); " id="home-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 text-center align-self-center text-intro">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h1 class="text-white" data-aos="fade-up" data-aos-delay="">electronic - Orang Tua Asuh</h1>
                <p class="lead text-white" data-aos="fade-up" data-aos-delay="100">Sistem yang menjembatani individu atau kelompok dalam menyalurkan bantuan yang ditujukan untuk mahasiswa dengan latar belakang sosial ekonomi lemah.</p>
                <p data-aos="fade-up" data-aos-delay="200"><a href="/login  " class="btn smoothscroll btn-primary">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 


    <div class="site-section" id="services-section">
      <div class="container">
        <div class="row ">
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5">Visi</h2>
          </div>
          
          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/002-travel-1.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Sarana Ibadah</h3>
                <p>Mempertemukan Donatur dengan mahasiswa berekonomi lemah. Dengan memberikan bantuan kepada mahasiswa dengan latar belakang sosial ekonomi lemah, InsyaAllah bantuan tersebut bisa menjadi sedekah jariah karena telah membantu biaya pendidikan demi mendapatkan ilmu bagi mahasiswa.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/001-travel.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Layanan</h3>
                <p>Memberikan layanan hingga mahasiwa mendapatkan orang tua asuh. Menyediakan informasi mahasiswa dengan latar belakang sosial ekonomi rendah, yang membutuhkan bantuan.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/003-travel-2.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Verifikasi</h3>
                <p>Proses verifikasi dilakukan setiap permintaan yang di ajukan, untuk menjamin mutu. Verifikasi dilakukan guna menyeleksi mahasiswa sehingga bantuan yang diberikan tepat sasaran.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/004-travel-3.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Kontrol</h3>
                <p>Terus mengontrol setiap aktifitas yang dilakukan pada sistem ini. pengontrolan dillakukan guna memantau proses penyaluran dana bantuan, kendala pada sistem, dan perkembangan mahasiswa yang terdaftar kedalam sistem.</p>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/005-travel-4.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Social Media Advertising</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="index/images/flaticon/svg/006-food.svg" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3>Web Design / Development</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>


    <section class="site-section bg-light" id="blog-section">
      <div class="container">
        <div class="row">
          
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5">Mahasiswa Terdaftar</h2>
          </div>

          <div class="demo">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
        <?php $no=1; ?>
        @foreach($data as $d)
                
        @if($d->role == 1 && $d->sudah == 3)
            <div class="testimonial">
                <h1><?= $no++; ?></h1>
                <p class="description">
                    Mahasiswa jurusan {{$d->jurusan}} dengan penghasilan orang tua <?php if($d->penghasilan == 1){echo 'Kecil dari Rp. 1.500.000,-';}elseif($d->penghasilan == 0.61){echo 'Rp. 1.500.000,- s/d Rp. 2.000.000,-';}elseif($d->penghasilan == 0.35){echo 'Rp. 2.000.000,- s/d Rp. 2.500.000,-';}elseif($d->penghasilan == 0.21){echo 'Rp. 2.500.000- s/d Rp. 3.000.000,-';}else{echo 'Besar dari Rp. 3.000.000,-';}; ?> dan beberapa tanggungan orang tua mahasiswa yang bersangkutan. Klik detail informasi untuk melihat detail informasi mahasiswa.
                </p>
                <div class="testimonial-content">
                    <div class="pic"><img src="{{ asset('assets/images/avatars/' . $d->image_mhs) }}" class=""alt=""></div>
                    <h3 class="title">{{$d->nama}}</h3>
                    <span class="post">{{$d->role1}}</span>
                    <a href="/login" class="btn btn-primary">Detail informasi</a>
                </div>
            </div>
            @endif

            @endforeach
                </div>
            </div>
        </div>
    </div>
        </div>
      </div>
    </section>


@endsection