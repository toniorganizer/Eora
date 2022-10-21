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
    @if(Auth::user()->role_bantu == 0)
    <H4>Anda belum memberikan bantuan langsung secara personal terhadap mahasiswa</H4>
    @endif
    @if(Auth::user()->role_bantu == 1)
        <h3>Informasi detail mahasiswa yang anda bantu</h3>
    <div class="row">
        @foreach($data as $d)
        <div class="col-md-4">
            <div class="main-card mb-3 card mt-5">
            <img width="100%" src="{{asset('assets/images/avatars/' . $d->image_mhs)}}" alt="Card image cap" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama}}</h5>
                    <h6 class="card-subtitle">{{$d->nim}}</h6>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="main-card mb-3 card mt-5">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama}}</h5>
                    <ul class="list-group">
                        <li class="list-group-item">{{$d->email_mhs}}</li>
                        <li class="list-group-item">{{$d->jurusan}}</li>
                        <li class="list-group-item">{{$d->alamat_mhs}}</li>
                        <li class="list-group-item">{{$d->nohp_mhs}}</li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Dokumen mahasiswa</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_tanggungan)}}" download>File tanggungan</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_nilai)}}" download>File nilai</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_penghasilan)}}" download>File penghasilan orang tua</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_pekad)}}" download>File prestasi akademik</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_penon)}}" download>File prestasi non akademik</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Beri bantuan</h5>
                <form action="beriLangsung" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emailMhs" value="{{$d->email_mhs}}">
                    <input type="hidden" name="emailDon" value="{{auth::user()->email}}">
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah bantuan yang diberikan">
                    <small id="passwordHelpBlock" class="form-text text-muted mb-3">
                        Isi berdasarkan besaran yang ditransfer. ex : 2.500.000
                    </small>
                    <div class="custom-file mb-3">
                        <input type="file" name="bukti" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Bukti transfer</label>
                    </div>
                    <button class="btn btn-primary" style="text-decoration:blink;">Bantu</button>
                </form>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
    

     @include('atribut/footer')
    @endif

@endsection