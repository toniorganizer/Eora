<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="{{ asset('style/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="flat-form">
            <h2 class="ml-2">Menu Register e-ORA</h2>
            <h5 class="ml-3 mb-4">Silahkan pilih menu register anda</h5>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                <a href="/login">Menu login</a>
                </div>
                @endif
            <ul class="tabs">
                <li class="radius1">
                    <a href="#register">Register Donatur</a>
                </li>
                <li class="radius2">
                    <a href="#reset">Register Mahasiswa</a>
                </li>
            </ul>
            <div id="register" class="form-action hide">
                <h2>Register Donatur</h1>
                <p>
                    Silahkan isi data anda jika bersedia menjadi donatur.
                </p>
                <form method="POST" action="/addDonatur" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">

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
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan" type="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan">

                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_mhs" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_mhs" type="alamat_don" class="form-control @error('alamat_don') is-invalid @enderror" name="alamat_don" value="{{ old('alamat_don') }}" required autocomplete="alamat_don">

                                @error('alamat_don')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nohp_mhs" class="col-md-4 col-form-label text-md-right">{{ __('No. Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="nohp_mhs" type="nohp_don" class="form-control @error('nohp_don') is-invalid @enderror" name="nohp_don" value="{{ old('nohp_don') }}" required autocomplete="nohp_don">

                                @error('nohp_don')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small id="emailHelp" class="form-text text-muted">E-mail hanya bisa digunakan satu kali register</small>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('File foto') }}</label>

                            <div class="col-md-6">
                                    <label for="exampleFormControlFile1">Upload foto</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    <small id="emailHelp" class="form-text text-muted">Foto Ukuran 3 x 4 | Max 2 MB</small>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small id="emailHelp" class="form-text text-muted">Password minimal 6 karakter</small>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mb-5">
                                <button type="submit" onclick="return confirm('Yakin ingin mendaftar?')" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="/" class="btn btn-danger">
                                    {{ __('Kembali') }}
                                </a>
                            </div>
                        </div>
                    </form>
            </div>

            <!--/#register.form-action-->
            <div id="reset" class="form-action hide">
                <h2>Register Mahasiswa</h2>
                <p>
                    Isi data anda dengan benar dan jujur.
                </p>
                <form method="POST" action="/addStudent" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus>

                                <input id="role" type="hidden" class="form-control" name="role" value="Mahasiswa">
                                <input id="role" type="hidden" class="form-control" name="sudah" value="0">
                                <input id="image" type="hidden" class="form-control" name="image" value="default.jpg">

                                @error('nim')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>

                            <div class="col-md-6">
                                <input id="jurusan" type="jurusan" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" required autocomplete="jurusan">

                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_mhs" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_mhs" type="alamat_mhs" class="form-control @error('alamat_mhs') is-invalid @enderror" name="alamat_mhs" value="{{ old('alamat_mhs') }}" required autocomplete="alamat_mhs">

                                @error('alamat_mhs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nohp_mhs" class="col-md-4 col-form-label text-md-right">{{ __('No. Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="nohp_mhs" type="nohp_mhs" class="form-control @error('nohp_mhs') is-invalid @enderror" name="nohp_mhs" value="{{ old('nohp_mhs') }}" required autocomplete="nohp_mhs">

                                @error('nohp_mhs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small id="emailHelp" class="form-text text-muted">E-mail hanya bisa digunakan satu kali register</small>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('File foto') }}</label>

                            <div class="col-md-6">
                                    <input name="image" type="file" class="form-control-file">
                                    <small id="emailHelp" class="form-text text-muted">Foto Ukuran 3 x 4 | Max 2 MB</small>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small id="emailHelp" class="form-text text-muted">Password minimal 6 karakter</small>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="return confirm('Yakin ingin mendaftar?')" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="/" class="btn btn-danger">
                                    {{ __('Kembali') }}
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
            <!--/#register.form-action-->
        </div>
    </div>
    <script class="cssdeck" src="style/jquery.js"></script>
    <script src="style/style.js"></script>
</body>
</html>


