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
                    <div class="card-body"><h5 class="card-title">Edit password admin</h5>
                        <form action="/changePassword" method="post">
                        @csrf
                            <div class="position-relative form-group">
                                <label for="current" class="">Password Lama</label>
                                <input name="current" id="current" type="password" class="form-control">
                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="position-relative form-group">
                                <label for="password_baru" class="">Password Baru</label>
                                <input name="password_baru" id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror">
                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                 @error('password_baru')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="konfirmasi_password" class="">Konfirmasi Password Baru</label>
                                <input name="konfirmasi_password" id="konfirmasi_password" type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror">
                                @error('konfirmasi_password')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>                            
                            <button class="mt-1 btn btn-primary">Edit password</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    

    @include('atribut/footer')


@endsection