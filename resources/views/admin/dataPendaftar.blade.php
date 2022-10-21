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
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Daftar Mahasiswa yang sudah mengisi persyaratan
                    <div class="btn-actions-pane-right">
                        <!-- <div role="group" class="btn-group-sm btn-group">
                            <button class="active btn btn-focus">Last Week</button>
                            <button class="btn btn-focus">All Month</button>
                        </div> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama</th>
                            <th class="text-center">email</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $no=1; ?>

                        @foreach($kriteria as $kriter)
                        <?php 
                        
                        if($kriter->penghasilan == 1){ $p = 1 * 0.41 ; }elseif($kriter->penghasilan == 0.61){ $p = 0.61 * 0.41;}elseif($kriter->penghasilan == 0.35){$p = 0.35 * 0.41; }elseif($kriter->penghasilan == 0.21){$p = 0.21 * 0.41; }else{$p = 0.13*0.41; }; 

                        if($kriter->nilai == 1){ $n = 1 * 0.19 ; }elseif($kriter->nilai == 0.64){ $n = 0.64 * 0.19;}elseif($kriter->nilai == 0.34){$n = 0.34 * 0.19; }elseif($kriter->nilai == 0.19){$n = 0.19 * 0.19; }else{$n = 0.10*0.19; };

                        if($kriter->tanggungan == 1){ $t = 1 * 0.26 ; }elseif($kriter->tanggungan == 0.54){ $t = 0.54 * 0.26;}elseif($kriter->tanggungan == 0.38){$t = 0.38 * 0.26; }elseif($kriter->tanggungan == 0.19){$t = 0.19 * 0.26; }else{$t = 0.12 * 0.26; };

                        if($kriter->prestasi_akd == 1){ $pa = 1 * 0.09 ; }elseif($kriter->prestasi_akd == 0.60){ $pa = 0.60 * 0.09;}elseif($kriter->prestasi_akd == 0.41){$pa = 0.41 * 0.09; }elseif($kriter->prestasi_akd == 0.22){$pa = 0.22 * 0.09; }else{$pa = 0.11 * 0.09; };

                        if($kriter->prestasi_nonakd == 1){ $pna = 1 * 0.06 ; }elseif($kriter->prestasi_nonakd == 0.50){ $pna = 0.50 * 0.06;}elseif($kriter->prestasi_nonakd == 0.33){$pna = 0.33 * 0.06; }elseif($kriter->prestasi_nonakd == 0.16){$pna = 0.16 * 0.06; }else{$pna = 0.10 * 0.06; };

                        $jumlah = $p+$n+$t+$pa+$pna;
                        
                        ?>


                        <tr>
                            <td class="text-center text-muted"><?= $no++; ?></td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src=" {{ asset('assets/images/avatars/' . $kriter->image_mhs) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading"><?= $kriter->nama ?></div>
                                            <div class="widget-subheading opacity-7"><?= $kriter->jurusan ?></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><?= $kriter->email_mhs ?></td>
                            <td class="text-center">
                                <div class="badge badge-warning"><?= $jumlah; ?></div>
                            </td>
                            <td class="text-center">
                            @if($kriter->role_kriteria == 1)
                                <div class="badge badge-secondary">Terverifikasi</div>
                            @else
                                <div class="badge badge-danger">Belum</div>
                            @endif
                            </td>
                            <td class="text-center">
                                <a href="/detailPendaftar/{{$kriter->nim}}" id="PopoverCustomT-1" class="badge badge-primary btn-sm mb-1">Details</a>
                                <form action="/dataHasil" method="post">
                                @csrf
                                <input type="hidden" name="email_mhs" value="{{$kriter->email_mhs}}">
                                <input type="hidden" name="role" value="1">
                                <input type="hidden" name="id_adm" value="{{Auth::user()->id}}">
                                <input type="hidden" name="hasil" value="<?= $jumlah ?>">
                                @if($kriter->role_kriteria == 0)
                                <button type="submit" id="PopoverCustomT-1" class="badge badge-primary btn-sm">Verifikasi</button>
                                @else
                                
                                @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
                <!-- <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                    <button class="btn-wide btn btn-success">Save</button>
                </div> -->
            </div>
        </div>
    </div>

    @include('atribut/footer')

@endsection