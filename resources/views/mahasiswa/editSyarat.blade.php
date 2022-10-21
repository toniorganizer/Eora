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
    <h3>Form melengkapi data verifikasi</h3>

    <div class="tab-pane tabs-animation">
    @foreach($data as $d)
    <form method="post" action="\editSyarat" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_adm" value="1">
    <input type="hidden" name="id" value="{{auth::user()->id}}">
    <input type="hidden" name="id_edit" value="{{$d->id}}">
    <input type="hidden" name="sudah" value="1">
    <input type="hidden" name="role" value="0">
    <input type="hidden" name="id_mhs" value="{{$d->email_mhs}}">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="position-relative form-group">
                            <label for="tanggungan" class="">Tanggungan orang tua</label>
                                <select type="select" name="tanggungan" class="custom-select">
                                    <option value="">--Pilih banyak taggungan orang tua--</option>
                                    @if($d->tanggungan == 1)
                                    <option value="1" selected>Lebih dari 5 bersaudara</option>
                                    @else
                                    <option value="1">Lebih dari 5 bersaudara</option>
                                    @endif
                                    @if($d->tanggungan == 0.54)
                                    <option value="0.54" selected>5 Bersaudara</option>
                                    @else
                                    <option value="0.54">5 Bersaudara</option>
                                    @endif
                                    @if($d->tanggungan == 0.38)
                                    <option value="0.38" selected>4 Bersaudara</option>
                                    @else
                                    <option value="0.38">4 Bersaudara</option>
                                    @endif
                                    @if($d->tanggungan == 0.19)
                                    <option value="0.19" selected>3 Bersaudara</option>
                                    @else
                                    <option value="0.19">3 Bersaudara</option>
                                    @endif
                                    @if($d->tanggungan == 0.12)
                                    <option value="0.12" selected>Kurang dari 3 bersaudara</option>
                                    @else
                                    <option value="0.12">Kurang dari 3 bersaudara</option>
                                    @endif
                                </select>
                            </div>
                            <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_tanggungan" id="exampleFile" type="file" value="{{$d->file_tanggungan}}" class="form-control-file @error('file_tanggungan') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file Kartu Keluarga Anda (File PDF/JPG | 300KB)</small>
                                @error('file_tanggungan')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="position-relative form-group">
                            <label for="tanggungan" class="">Nilai index prestasi komulatif (IPK)</label>
                                <select type="select" name="nilai" class="custom-select">
                                    <option value="">--Pilih Nilai IPK--</option>
                                    @if($d->nilai == 1)
                                    <option value="1" selected>Nilai > 3.75</option>
                                    @else
                                    <option value="1">Nilai > 3.75</option>
                                    @endif
                                    @if($d->nilai == 0.64)
                                    <option value="0.64" selected>3.5 < Nilai < 3.75 </option>
                                    @else
                                    <option value="0.64">3.5 < Nilai < 3.75 </option>
                                    @endif
                                    @if($d->nilai == 0.34)
                                    <option value="0.34" selected>3.25 < Nilai < 3.5 </option>
                                    @else
                                    <option value="0.34">3.25 < Nilai < 3.5 </option>
                                    @endif
                                    @if($d->nilai == 0.19)
                                    <option value="0.19" selected>3.00 < Nilai < 3.25</option>
                                    @else
                                    <option value="0.19">3.00 < Nilai < 3.25</option>
                                    @endif
                                    @if($d->nilai == 0.10)
                                    <option value="0.10" selected>Nilai < 3.00 </option>
                                    @else
                                    <option value="0.10">Nilai < 3.00 </option>
                                    @endif
                                </select>
                            </div>
                            <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_nilai" id="exampleFile" type="file" class="form-control-file @error('file_nilai') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file Historis Nilai Anda (File PDF/JPG | 300KB)</small>
                                @error('file_nilai')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="position-relative form-group">
                            <label for="tanggungan" class="">Penghasilan orang tua</label>
                                <select type="select" name="penghasilan" class="custom-select">
                                    <option value="">--Pilih banyak penghasilan orang tua--</option>
                                    @if($d->penghasilan == 1)
                                    <option value="1" selected>Penghasilan kecil dari Rp.1.500.000,-</option>
                                    @else
                                    <option value="1">Penghasilan kecil dari Rp.1.500.000,-</option>
                                    @endif
                                    @if($d->penghasilan == 0.61)
                                    <option value="0.61" selected>Rp.1.500.000,- s/d Rp.2.000.000,-</option>
                                    @else
                                    <option value="0.61">Rp.1.500.000,- s/d Rp.2.000.000,-</option>
                                    @endif
                                    @if($d->penghasilan == 0.35)
                                    <option value="0.35" selected>Rp.2.000.000,- s/d Rp.2.500.000,-</option>
                                    @else
                                    <option value="0.35">Rp.2.000.000,- s/d Rp.2.500.000,-</option>
                                    @endif
                                    @if($d->penghasilan == 0.21)
                                    <option value="0.21" selected>Rp.2.500.000- s/d Rp.3.000.000,-</option>
                                    @else
                                    <option value="0.21">Rp.2.500.000- s/d Rp.3.000.000,-</option>
                                    @endif
                                    @if($d->penghasilan == 0.13)
                                    <option value="0.13" selected>Penghasilan besar dari Rp.3.000.000,-</option>
                                    @else
                                    <option value="0.13">Penghasilan besar dari Rp.3.000.000,-</option>
                                    @endif
                                </select>
                            </div>
                            <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_penghasilan" id="exampleFile" type="file" class="form-control-file @error('file_penghasilan') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file slip gaji orang tua anda (File PDF/JPG | 300KB)</small>
                                @error('file_penghasilan')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="position-relative form-group">
                            <label for="tanggungan" class="">Prestasi akademik</label>
                                <select type="select" name="prestasi_akd" class="custom-select">
                                    <option value="">--Pilih prestasi akademik--</option>
                                    @if($d->prestasi_akd == 1)
                                    <option value="1" selected>Internasional</option>
                                    @else
                                    <option value="1">Internasional</option>
                                    @endif
                                    @if($d->prestasi_akd == 0.60)
                                    <option value="0.60" selected>Nasional</option>
                                    @else
                                    <option value="0.60">Nasional</option>
                                    @endif
                                    @if($d->prestasi_akd == 0.41)
                                    <option value="0.41" selected>Provinsi/Kota</option>
                                    @else
                                    <option value="0.41">Provinsi/Kota</option>
                                    @endif
                                    @if($d->prestasi_akd == 0.22)
                                    <option value="0.22" selected>Perguruan tinggi</option>
                                    @else
                                    <option value="0.22">Perguruan tinggi</option>
                                    @endif
                                    @if($d->prestasi_akd == 0.11)
                                    <option value="0.11" selected>Tidak ada</option>
                                    @else
                                    <option value="0.11">Tidak ada</option>
                                    @endif
                                </select>
                        </div>
                        <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_pekad" id="exampleFile" type="file" class="form-control-file @error('file_pekad') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file Sertifikat prestasi anda (File PDF/JPG | 300KB)</small>
                                @error('file_pekad')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="tanggungan" class="">Prestasi Non Akademik</label>
                                <select type="select" name="prestasi_nonakd" class="custom-select">
                                    <option value="">--Pilih prestasi non akademik anda--</option>
                                    @if($d->prestasi_nonakd == 1)
                                    <option value="1" selected>Internasional</option>
                                    @else
                                    <option value="1">Internasional</option>
                                    @endif
                                    @if($d->prestasi_nonakd == 0.50)
                                    <option value="0.50" selected>Nasional</option>
                                    @else
                                    <option value="0.50">Nasional</option>
                                    @endif
                                    @if($d->prestasi_nonakd == 0.33)
                                    <option value="0.33" selected>Provinsi/Kota</option>
                                    @else
                                    <option value="0.33">Provinsi/Kota</option>
                                    @endif
                                    @if($d->prestasi_nonakd == 0.16)
                                    <option value="0.16" selected>Perguruan tinggi</option>
                                    @else
                                    <option value="0.16">Perguruan tinggi</option>
                                    @endif
                                    @if($d->prestasi_nonakd == 0.10)
                                    <option value="0.10" selected>Tidak ada</option>
                                    @else
                                    <option value="0.10">Tidak ada</option>
                                    @endif
                                </select>
                        </div>
                        <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_penon" id="exampleFile" type="file" class="form-control-file @error('file_penon') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file sertifikat prestasi anda (File PDF/JPG | 300KB)</small>
                                @error('file_penon')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button class="btn btn-primary">Update</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
                 @endforeach
    </div>
  

@endsection