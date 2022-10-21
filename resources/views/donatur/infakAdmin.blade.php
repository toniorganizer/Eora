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
        <div class="col-6">
            <h3>Infak admin</h3>
            <p >Infak admin merupakan pemberian suka rela yang nanti akan digunakan untuk pengelolaan administrasi</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        @if(Auth::user()->role_infak == 0)
            <form action="/infakAdmin" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Jumlah infak yang akan anda berikan</label>
                <input type="text" name="infak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="hidden" name="email_don" class="form-control" value="{{Auth::user()->email}}">
                <small id="emailHelp"  class="form-text text-muted">Isi dengan besaran tanpa meggunakan titik. Ex : 2000000</small>
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Salurkan</button>
            </form>
        @endif
        @if(Auth::user()->role_infak == 1)
        <form action="/hitungInfak" method="post">
        @csrf
        <div class="form-group">

            <label for="exampleFormControlFile1">Upload bukti transfer anda</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
            <small id="emailHelp"  class="form-text text-muted mb-3">Upload bukti transfer anda</small>

            <input type="hidden" name="role_donasi" class="form-control" value="1">

            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="id">
                <option selected>Pilih besaran uang berdasarkan bukti transfer yang akan anda berikan</option>
            @foreach($data as $d)
                <option value="{{$d->id}}">{{$d->besaran}}</option>
            @endforeach
            </select>
            <select class="custom-select mr-sm-2 mt-3" id="inlineFormCustomSelect" name="jumlah">
                <option selected>Ulangi sekali lagi</option>
            @foreach($data as $d)
                <option value="{{$d->besaran}}">{{$d->besaran}}</option>
            @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mb-3">Upload</button>
        </form>
        @endif
        </div>
    </div>
    <div class="row mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                <p class="mb-2 text-center">Jumlah infak yang terkumpul</p>
                    <span class="metismenu-icon pe-7s-cash" style="font-size:260px;margin-left:100px;"></span>
                    <?php $jumlah = 0; ?>
                    @foreach($data as $d)
                        <?php $jumlah+=$d->jumlah_infak; ?>
                    @endforeach
                    <p class="display-4 text-center"> Rp. <?= $jumlah; ?></p>
                    <p class="display-4 text-center"> </p>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    
    @include('atribut/footer')

@endsection