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
                        <form action="/prosesEditDonatur" method="post">
                        @csrf
                            
                            <div class="position-relative form-group">
                                <label for="nama" class="">Nama</label>
                                <input name="nama" id="nama" type="text" value="{{$d->nama}}" class="form-control">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="position-relative form-group">
                                <label for="email" class="">E-mail</label>
                                <input name="email" id="email" value="{{$d->email}}" type="email" class="form-control" readonly>
                            </div>
                            <div class="position-relative form-group">
                                <label for="pekerjaan" class="">Pekerjaan</label>
                                <input name="pekerjaan" id="pekerjaan" type="text" value="{{$d->pekerjaan}}" class="form-control">
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