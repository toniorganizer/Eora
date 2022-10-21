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

    <h3>Tambah data donatur</h3>

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Silahkan isi data donatur baru</h5>
                            <form action="/tambahDonatur" method="post">
                            @csrf
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Nama</label>
                                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">

                                    <input id="role" type="hidden" class="form-control" name="role" value="Donatur">
                                    <input id="role" type="hidden" class="form-control" name="sudah" value="0">
                                    <input id="role" type="hidden" class="form-control" name="email_mhs" value="0">

                                    <input id="image" type="hidden" class="form-control" name="image" value="default.jpg">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Pekerjaan</label>
                                    <input name="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekeraan') }}">
                                    @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Alamat</label>
                                    <input name="alamat_don" type="text" class="form-control @error('alamat_don') is-invalid @enderror" value="{{ old('alamat_don') }}">
                                    @error('alamat_don')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">No. Handphone</label>
                                    <input name="nohp_don" type="text" class="form-control @error('nohp_don') is-invalid @enderror" value="{{ old('nohp_don') }}">
                                    @error('nohp_don')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">E-mail</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                                    <small id="emailHelp" class="form-text text-muted">E-mail hanya bisa digunakan satu kali register</small>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Ulangi password</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>
                                
                                <button class="mt-1 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
@endsection