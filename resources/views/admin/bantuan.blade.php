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
                    <div class="card-header">Data Donatur yang membantu Mahasiswa
                        <div class="btn-actions-pane-right">
                            <a href="cetakBantuan" class="btn btn-primary" target="_blank">Cetak
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Donatur</th>
                                <th class="text-center">Nama mahasiswa</th>
                                <th class="text-center">Hp donatur</th>
                                <th class="text-center">Hp Mahasiswa </th>
                                <th class="text-center">Jumlah donasi</th>
                                <th class="text-center">Bukti TF</th>
                                <th class="text-center">Action</th>
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $d)
                            <tr>
                                <td class="text-center text-muted"><?= $no++;?></td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="{{ asset('assets/images/avatars/'. $d->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$d->nama_don}}</div>
                                                <div class="widget-subheading opacity-7">{{$d->pekerjaan}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{$d->nama}}</td>
                                <td class="text-center">{{$d->nohp_don}}</td>
                                <td class="text-center">{{$d->nohp_mhs}}</td>
                                <td class="text-center">{{$d->jumlah_donasi}}</td>
                                
                                @if($d->aturan == 0)
                                <td class="text-center"><a href="{{asset('assets/file_upload/' . $d->bukti)}}" download>Bukti</a></td>
                                @endif
                                @if($d->aturan == 1)
                                <td class="text-center"><a href="/">Oke</a></td>
                                @endif
                                @if($d->aturan == 0)
                                <td class="text-center">
                                <form action="validasiLangsung" method="post">
                                @csrf
                                <input type="hidden" name="email_don" value="{{$d->email_donatur}}">
                                <input type="hidden" name="email_mhs" value="{{$d->email_mahasiswa}}">
                                <input type="hidden" name="jumlah" value="{{$d->jumlah_donasi}}">
                                    <button type="submit" class="badge badge-primary">validasi</button>
                                </form>
                                </td>
                                @endif
                                @if($d->aturan == 1)
                                <td class="text-center"><a href="#">Tervalidasi</a></td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    

    @include('atribut/footer')


@endsection
