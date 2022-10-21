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
    <div class="col-md-3"></div>
        <div class="col-6">
            <h3 class="text-center">Infak admin</h3>
            <p class="text-center">Infak admin merupakan pemberian suka rela yang nanti akan digunakan untuk pengelolaan administrasi</p>
        </div>
    </div>
    <div class="row">
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