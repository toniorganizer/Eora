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

    @foreach($data as $d)
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">{{$d->nama}}</h5><h6 class="mb-0 card-subtitle">{{$d->nim}}</h6></div>
                <img width="100%" src="{{asset('assets/images/avatars/' . $d->image_mhs)}}" alt="Card image cap">
                <div class="card-body">{{$d->email_mhs}} <br> {{$d->jurusan}} | {{$d->alamat_mhs}} <br> {{$d->nohp_mhs}} </div>
                <div class="card-body"><a href="/editMhs/{{$d->email_mhs}}" class="card-link">Edit profile</a></div>
            </div>
        </div>
    @endforeach
    

    @include('atribut/footer')


@endsection