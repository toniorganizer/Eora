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

  
    
    <div class="row">
        <div class="col-md-12">
            <h3>Data mahasiswa yang mendapat bantuan umum</h3>
        </div>
        <div class="col-md-6">
            <form action="cariHistory" method="get">
            @csrf
            <div class="input-group is-invalid">
                <div class="custom-file">
                    <input type="text" name="cari" class="form-control" placeholder="Berdasarkan Tanggal atau Bulan...">
                </div>
                <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button">Cari</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group list-group-horizontal-md mb-4 mt-4">
            @foreach($data as $d)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$d->nama}}
                <span class="badge badge-warning badge-pill">Rp. {{$d->jumlah_distribusi}}</span>
            </li>
            <p  class="mt-1" style="font-size:11px;font-family:arial;">Waktu distribusi :{{ $d->waktu }}</p>
            @endforeach
            </ul>
            {{$data->links()}}
        </div>
    </div>

     @include('atribut/footer')


@endsection