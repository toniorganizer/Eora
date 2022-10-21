<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register Mahasiswa</title>

<!-- Custom fonts for this template-->
  <link href="css_index/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css_index/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
              </div>
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                <a href="/newLogin">Menu login</a>
                </div>
                @endif
              <form class="user" method="POST" action="/addStudent" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nim" class="form-control form-control-user @error('nim') is-invalid @enderror" id="exampleFirstName" value="{{ old('nim') }}" placeholder="NIM">
                    <input id="role" type="hidden" class="form-control" name="role" value="Mahasiswa">
                    <input id="role" type="hidden" class="form-control" name="sudah" value="0">
                    @error('nim')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" id="exampleLastName" placeholder="Jurusan">
                    @error('jurusan')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" id="exampleInputEmail" value="{{ old('nama') }}" placeholder="Nama">
                  @error('nama')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('alamat_mhs') is-invalid @enderror" name="alamat_mhs" value="{{ old('alamat_mhs') }}" id="exampleInputEmail" placeholder="Alamat">
                  @error('alamat_mhs')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('nohp_mhs') is-invalid @enderror" name="nohp_mhs" value="{{ old('nohp_mhs') }}" id="exampleInputEmail" placeholder="No Handphone">
                  @error('nohp_mhs')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1" class="font-weight-light">File foto</label>
                  <input type="file" name="image" class="form-control-file font-weight-light" id="exampleFormControlFile1">
                  <small id="emailHelp" class="form-text text-muted font-weight-light">Foto Ukuran 3 x 4 | Max 2 MB</small>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail" placeholder="E-mail">
                  @error('email')
                        <span class="invalid-feedback" image="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" onclick="return confirm('Yakin ingin mendaftar?')" class="btn btn-primary btn-user btn-block">
                  Register
                </button>
               
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/">Lupa password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/newLogin">Sudah punya akun? Login!</a>
              </div>
              <div class="text-center">
                <a class="small" href="/">Kembali?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="css_index/css/jquery.min.js"></script>
  <script src="css_index/css/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="css_index/css/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="css_index/css/sb-admin-2.min.js"></script>

</body>

</html>
