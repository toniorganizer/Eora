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
    @if(Auth::user()->role_donasi == 0)
    <div class="row">
    <div class="col-7">
        <h3>Bantuan umum</h3>   
        <p>Bapak/Ibu dapat memberikan bantuan umum berapapun, hasil donasi/bantuan umum yang terkumpul akan dibagi rata ke mahasiswa yang terdaftar dan belum mendapat bantuan langsung selama satu bulan sekali</p>

        <form action="/prosesUmum" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Jumlah bantuan yang diberikan</label>
            <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="hidden" name="role_donasi" class="form-control" value="1">
            <input type="hidden" name="email_don" class="form-control" value="{{Auth::user()->email}}">
            <small id="emailHelp"  class="form-text text-muted">Isi dengan besaran tanpa meggunakan titik. Ex : 2000000</small>
        </div>
        
        <button type="submit" class="btn btn-primary mb-3">Donasi</button>
        </form>
    </div>
    </div>
    @endif
    @if(Auth::user()->role_donasi == 1)
    <div class="row">
    <div class="col-7">
        <h3>Bantuan umum</h3>   
        <p>Silahkan bapak/ibu upload bukti transfer</p>

        <form action="/hitungBantuan" method="post">
        @csrf
        <div class="form-group">

            <label for="exampleFormControlFile1">Upload bukti transfer</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
            <small id="emailHelp"  class="form-text text-muted mb-3">Upload bukti transfer</small>

            <input type="hidden" name="role_donasi" class="form-control" value="1">

            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="id">
                <option selected>Pilih besaran uang berdasarkan bukti transfer yang telah diberikan</option>
            @foreach($data as $d)
                <option value="{{$d->id}}">{{$d->jumlah_donasi}}</option>
            @endforeach
            </select>
            <select class="custom-select mr-sm-2 mt-3" id="inlineFormCustomSelect" name="total">
                <option selected>Ulangi sekali lagi</option>
            @foreach($data as $d)
                <option value="{{$d->jumlah_donasi}}">{{$d->jumlah_donasi}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mb-3">Upload</button>
        </form>
    </div>
    </div>
    @endif

     @include('atribut/footer')

@endsection