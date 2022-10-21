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
        <div class="col-md-4">
            <div class="main-card mb-3 card">
            @foreach($data as $d)
            <img width="100%" src="{{asset('assets/images/avatars/' . $d->image_mhs)}}" alt="Card image cap" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">{{$d->nama}}</h5>
                <h6 class="card-subtitle">{{$d->nim}}</h6>
                <form action="/bantu" method="post">
                @csrf
                    <input type="hidden" name="sudah" value="2">
                    <!-- <input type="hidden" name="jumlah" value="2.000.000"> -->
                    <!-- <input type="hidden" name="id_mhs" value="{{$d->id}}"> -->
                    <input type="hidden" name="email" value="{{$d->email_mhs}}">
                    <input type="hidden" name="sudahh" value="4">
                    @foreach($donatur as $don)
                    <input type="hidden" name="id_donatur" value="{{$don->id}}">
                    <input type="hidden" name="email_donatur" value="{{$don->email}}">
                    @endforeach
                    <button type="submit" class="btn btn-primary">Bantu</button>
                </form>
                <a href="/listMahasiswa" class="btn btn-danger mt-2">Kembali</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama}}</h5>
                    <ul class="list-group">
                        <li class="list-group-item">{{$d->email_mhs}}</li>
                        <li class="list-group-item">{{$d->jurusan}}</li>
                        <li class="list-group-item">{{$d->alamat_mhs}}</li>
                        <li class="list-group-item">{{$d->nohp_mhs}}</li>
                    </ul>
                </div>
            </div>

            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Dokumen persyaratan</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_tanggungan)}}" download>File tanggungan</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_nilai)}}" download>File nilai</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_penghasilan)}}" download>File penghasilan orang tua</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_pekad)}}" download>File prestasi akademik</a></li>
                        <li class="list-group-item"><a href="{{asset('assets/file_upload/' . $d->file_penon)}}" download>File prestasi non akademik</a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('atribut/footer')

@endsection