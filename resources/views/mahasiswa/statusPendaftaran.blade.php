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
     <?php if( Auth::user()->sudah == 1) { ?>
    
    <div class="row">
      <div class="col-md-10 col-xl-10">
          <h3>Maaf, belum ada donatur yang ingin memberi bantuan biaya pendidikan anda</h3>
    </div>
    </div>

    <?php } if( Auth::user()->sudah == 3) { ?>
    
    <div class="row">
      <div class="col-md-10 col-xl-10">
          <h3>Maaf, belum ada donatur yang ingin memberi bantuan biaya pendidikan anda</h3>
    </div>
    </div>

    <?php } elseif(auth::user()->sudah == 2){?>
        <div class="row">
        <div class="col-md-12 col-xl-10">
          <h3>Selamat, ada donatur yang ingin membantu biaya pendidikan anda</h3>
          <p>Informasi detail donatur</p>
        </div>
        <div class="col-md-4">
            @foreach($data as $d)
            <div class="main-card mb-3 card mt-5">
            <img width="100%" src="{{asset('assets/images/avatars/' . $d->image)}}" alt="Card image cap" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama_don}}</h5>
                    <h6 class="card-subtitle">{{$d->pekerjaan}}</h6>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="main-card mb-3 card mt-5">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama_don}}</h5>
                    <ul class="list-group">
                        <li class="list-group-item">{{$d->email}}</li>
                        <li class="list-group-item">{{$d->pekerjaan}}</li>
                        <li class="list-group-item">{{$d->alamat_don}}</li>
                        <li class="list-group-item">{{$d->nohp_don}}</li>
                    </ul>
                </div>
                @if(auth::user()->role_langsung == 2)
                <div class="card-body">
                    <h5 class="card-title">Besaran biaya bantuan yg sudah diberikan</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Rp. {{$d->jumlah_donasi}},-</li>
                        <small id="passwordHelpBlock" class="form-text text-muted mb-3">
                        Silahkan cek saldo ATM anda
                    </small>
                    </ul>
                </div>
                @endif
            </div>
        </div>
        @endforeach

    </div>
    <!-- jika data belum dilengkapi -->
    <?php } ?>
    
    @include('atribut/footer')

@endsection