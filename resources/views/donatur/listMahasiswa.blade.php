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
    <?php if( Auth::user()->sudah == 4 ) { ?>
        <h3>Anda sudah membantu satu mahasiswa</h3>
        <a href="/bantuanMhs" class="btn btn-primary mb-5">Detail mahasiswa yang anda bantu</a>
    <?php } ?>

    <?php if( Auth::user()->sudah == 0 ) { ?>
    <div class="row">
    <h3>Pengurutan data pendaftar berdasarkan jumlah nilai kelengkapan kriteria pendaftar</h3>
    <?php $no=1; ?>
    @foreach($data as $d)
    
    @if($d->role == 1 && $d->sudah == 3)
    <div class="col-md-4">

        <div class="card mt-5" style="width: 18rem;">
        <img src="{{ asset('assets/images/avatars/' . $d->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $no++;?>. {{$d->nama}}</h5>
            <p class="card-text"></p>
            
            <p class="card-text">Hasil jumlah nilai kriteria = {{$d->hasil}}</p>
            <a href="/detailMahasiswa/{{$d->nim}}" class="btn btn-primary">Detail informasi</a>
        </div>
        </div>
    </div>
    @endif

    @endforeach
    </div>
    <?php } ?>
    <!-- end pegawai -->

     @include('atribut/footer')

@endsection