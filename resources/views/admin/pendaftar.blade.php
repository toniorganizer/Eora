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
                    <div class="card-header">Data keseluruhan pendaftar
                        <div class="btn-actions-pane-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah data</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">email</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">No. Handphone</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $d)
                            <tr>
                                <td class="text-center text-muted"><?= $no++;?></td>
                                <td class="text-center"><?= $d->nim ?></td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="{{ asset('assets/images/avatars/'. $d->image_mhs)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$d->nama}}</div>
                                                <div class="widget-subheading opacity-7">{{$d->jurusan}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{$d->email_mhs}}</td>
                                <td class="text-center">{{$d->alamat_mhs}}</td>
                                <td class="text-center">{{$d->nohp_mhs}}</td>
                                <td class="text-center">
                                    <a href="/hapusMhs/{{$d->email_mhs}}" id="PopoverCustomT-1" class="badge badge-danger badge-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    <a href="/editMhsAdmin/{{$d->email_mhs}}" id="PopoverCustomT-1" class="badge badge-secondary badge-sm">Edit</a>
                                </td>
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