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
    <!-- jika data sudah dilengkapi -->
    <?php if( Auth::user()->sudah == 1) { ?>
    
    <div class="row">
      <div class="col-md-10 col-xl-10">
          <h3>Persyaratan sudah anda lengkapi, silahkan tunggu status pendaftaran pengajuan permohonan anda</h3>
          <a href="/editLengkap/{{auth::user()->email}}" class="btn btn-primary mt-2">Edit Persyaratan?</a>
    </div>
    </div>

    <?php } elseif(auth::user()->sudah == 2){?>
        <div class="row">
      <div class="col-md-10 col-xl-10">
          <h3>Selamat, ada donatur yang ingin membantu biaya pendidikan anda</h3>
          <p>Informasi detail donatur, bisa anda lihat dimenu status pendaftaran</p>
    </div>
    </div>
    <!-- jika data belum dilengkapi -->
    <?php } elseif(auth::user()->sudah == 3){?>
        <div class="row">
      <div class="col-md-10 col-xl-10">
          <h3>Persyaratan sudah anda lengkapi, silahkan tunggu status pendaftaran pengajuan permohonan anda</h3>
          <a href="/editLengkap/{{auth::user()->email}}" class="btn btn-primary mt-2">Edit Persyaratan?</a>
    </div>
    </div>
    <!-- jika data belum dilengkapi -->
    <?php } else{?>
    <h3>Lengkapi dokumen persyaratan</h3>

    <div class="tab-pane tabs-animation">
    <form method="post" action="\prosesLengkap" class="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_adm" value="1">
    <input type="hidden" name="id" value="{{auth::user()->id}}">
    <input type="hidden" name="sudah" value="1">
    <input type="hidden" name="role" value="0">
    @foreach($data as $d)
    <input type="hidden" name="id_mhs" value="{{$d->email_mhs}}">
    @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        @foreach($data as $d)
                            <h4>Profile anda</h4>
                            <h6>NIM     : {{$d->nim}}</h6>
                            <h6>Nama    : {{$d->nama}}</h6>
                            <h6>Jurusan : {{$d->jurusan}}</h6>
                            <h6>Alamat  : {{$d->alamat_mhs}}</h6>
                            <h6>No. HP  : {{$d->nohp_mhs}}</h6>
                        @endforeach
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/avatars/' . Auth::user()->image )}}" class="img-thumbnail rounded" alt="...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                    <label for="inputState">Pekerjaan ayah</label>
                    <select id="inputState" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="form-control">
                        <option>Pilih..</option>
                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Petani">Petani</option>
                        <option value="Pegawai swata">Pegawai swata</option>
                        <option value="Profesi (Bekerja Sendiri)">Profesi (Bekerja Sendiri)</option>
                        <option value="Profesi (Bekerja dengan/untuk orang lain)">Profesi (Bekerja dengan/untuk orang lain)</option>
                        <option value="Seniman (Pelukis/penanyi/dll)">Seniman (Pelukis/penanyi/dll)</option>
                        <option value="Pegawai BUMN">Pegawai BUMN</option>
                        <option value="Polisi/TNI">Polisi/TNI</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="inputState">Pekerjaan ibu</label>
                    <select id="inputState" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="form-control">
                        <option>Pilih..</option>
                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Petani">Petani</option>
                        <option value="Pegawai swata">Pegawai swata</option>
                        <option value="Profesi (Bekerja Sendiri)">Profesi (Bekerja Sendiri)</option>
                        <option value="Profesi (Bekerja dengan/untuk orang lain)">Profesi (Bekerja dengan/untuk orang lain)</option>
                        <option value="Seniman (Pelukis/penanyi/dll)">Seniman (Pelukis/penanyi/dll)</option>
                        <option value="Pegawai BUMN">Pegawai BUMN</option>
                        <option value="Polisi/TNI">Polisi/TNI</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Rekening</label>
                        <input type="text"name="norek" value="{{ old('norek') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">No. Rekening Bank Nagari.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan tambahan</label>
                        <textarea name="keterangan_tambahan" value="{{ old('keterangan_tambaha') }}" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Keterangan tambahan untuk meyakinkan donatur</small>
                    </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya UKT/Semester</label>
                        <input type="text" name="ukt" value="{{ old('ukt') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rp. 2.500.000">
                    </div>
                    <div class="position-relative form-group">
                        <!-- <label for="exampleFile" class="">File</label> -->
                        <input name="file_ukt" value="{{ old('file_ukt') }}" id="exampleFile" type="file" class="form-control-file @error('file_tanggungan') is-invalid @enderror">
                            <small class="form-text text-muted">Masukan file Tagihan biaya UKT (File PDF/JPG | 300KB)</small>
                            @error('file_ukt')
                                <span class="invalid-feedback" image="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="tanggungan" class="">Tanggungan orang tua</label>
                                <select type="select" name="tanggungan" value="{{ old('tanggungan') }}" class="custom-select">
                                    <option value="">--Pilih banyak taggungan rang tua--</option>
                                    <option value="1">Lebih dari 5 bersaudara</option>
                                    <option value="0.54">5 Bersaudara</option>
                                    <option value="0.38">4 Bersaudara</option>
                                    <option value="0.19">3 Bersaudara</option>
                                    <option value="0.12">Kurang dari 3 bersaudara</option>
                                </select>
                            </div>
                            <div class="position-relative form-group">
                            <!-- <label for="exampleFile" class="">File</label> -->
                            <input name="file_tanggungan" id="exampleFile" type="file" class="form-control-file @error('file_tanggungan') is-invalid @enderror">
                                <small class="form-text text-muted">Masukan file Kartu Keluarga Anda (File PDF/JPG | 300KB)</small>
                                @error('file_tanggungan')
                                    <span class="invalid-feedback" image="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="position-relative form-group">
                            <label for="tanggungan" class="">Nilai index prestasi komulatif (IPK)</label>
                                <select type="select" name="nilai" value="{{ old('nilai') }}" class="custom-select">
                                    <option value="">--Pilih Nilai IPK--</option>
                                    <option value="1">Nilai > 3.75</option>
                                    <option value="0.64">3.5 < Nilai < 3.75 </option>
                                    <option value="0.34">3.25 < Nilai < 3.5 </option>
                                    <option value="0.19">3.00 < Nilai < 3.25</option>
                                    <option value="0.10">Nilai < 3.00 </option>
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
                                <select type="select" name="penghasilan" value="{{ old('penghasilan') }}" class="custom-select">
                                    <option value="">--Pilih banyak penghasilan orang tua--</option>
                                    <option value="1">Penghasilan kecil dari Rp.1.500.000,-</option>
                                    <option value="0.61">Rp.1.500.000,- s/d Rp.2.000.000,-</option>
                                    <option value="0.35">Rp.2.000.000,- s/d Rp.2.500.000,-</option>
                                    <option value="0.21">Rp.2.500.000- s/d Rp.3.000.000,-</option>
                                    <option value="0.13">Penghasilan besar dari Rp.3.000.000,-</option>
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
                        <!-- </div>
                        <div class="card-body"> -->
                        <div class="position-relative form-group">
                            <label for="tanggungan" class="">Prestasi akademik</label>
                                <select type="select" name="prestasi_akd" value="{{ old('prestasi_akd') }}" class="custom-select">
                                    <option value="">--Pilih prestasi akademik--</option>
                                    <option value="1">Internasional</option>
                                    <option value="0.60">Nasional</option>
                                    <option value="0.41">Provinsi/Kota</option>
                                    <option value="0.22">Perguruan tinggi</option>
                                    <option value="0.11">Tidak ada</option>
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
                                <select type="select" name="prestasi_nonakd" value="{{ old('prestasi_nonakd') }}" class="custom-select">
                                    <option value="">--Pilih prestasi non akademik anda--</option>
                                    <option value="1">Internasional</option>
                                    <option value="0.50">Nasional</option>
                                    <option value="0.33">Provinsi/Kota</option>
                                    <option value="0.16">Perguruan tinggi</option>
                                    <option value="0.10">Tidak ada</option>
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

                        <button class="btn btn-primary" onclick="return confirm('Yakin data yang anda masukan sudah benar?')">Submit</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <?php } ?>
  

@endsection