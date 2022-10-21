@extends('layouts/main')


@section('container') 

    <!-- sidebar -->
    @include('atribut/sidebar_log')
    <!-- end sidebar -->

    <!-- title dashboard -->
    @include('atribut/title')
    <!-- end title dashboard -->
    @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

    <!-- Data pegawai -->
    <div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if( Auth::user()->sudah == 4 ) { ?>
                <div class="col-lg-8">
                    <h3>Bapak/Ibu {{Auth::user()->name}} mohon maaf, Bapak/Ibu sudah membantu salah satu mahasiswa</h3>
                    <a href="/bantuanMhs" class="btn btn-primary mb-5 mt-2">Detail mahasiswa yang dibantu</a>
                </div>
                <?php } ?>
                <!-- Data pegawai -->
                <?php if( Auth::user()->sudah == 0 ) { ?>
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
                            <a href="/detailMahasiswa/{{$d->nim}}" class="btn btn-primary">Detail informasi</a>
                        </div>
                    </div>
                    @endif

                    @endforeach
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('atribut/footer')

@endsection