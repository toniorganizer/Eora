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

        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Edit data pendaftar</h5>
                    @foreach($data as $d)
                        <form action="/prosesEditMhs" method="post">
                        @csrf
                            <div class="position-relative form-group">
                                <label for="nim" class="">NIM</label>
                                <input name="nim" id="nim" type="text" value="{{$d->nim}}" class="form-control">
                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="position-relative form-group">
                                <label for="nama" class="">Nama</label>
                                <input name="nama" id="nama" type="text" value="{{$d->nama}}" class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="email_mhs" class="">E-mail</label>
                                <input name="email_mhs" id="email_mhs" value="{{$d->email_mhs}}" type="email" class="form-control" readonly>
                            </div>
                            <div class="position-relative form-group">
                                <label for="jurusan" class="">Jurusan</label>
                                <input name="jurusan" id="jurusan" type="text" value="{{$d->jurusan}}" class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="alamat_mhs" class="">Alamat</label>
                                <input name="alamat_mhs" id="alamat_mhs" type="text" value="{{$d->alamat_mhs}}" class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="nohp_mhs" class="">No. Handphone</label>
                                <input name="nohp_mhs" id="nohp_mhs" type="text" value="{{$d->nohp_mhs}}" class="form-control">
                            </div>
                            
                            <button class="mt-1 btn btn-primary">Edit data</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
    

    @include('atribut/footer')


@endsection