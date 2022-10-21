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
    <div class="col-md-4"></div>
    <div class="col-7">
        <h3 class="ml-5">Bantuan umum</h3>
        <p>Jumlah donasi/bantuan umum yang terkumpul</p>
        
    </div>
    </div>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                <p class="mb-2 text-center">Bantuan umum akan diberikan kepada mahasiswa yang tidak mendapat bantuan langsung dari donatur</p>
                    <span class="metismenu-icon pe-7s-cash" style="font-size:260px;margin-left:100px;"></span>
                    <?php $jumlah = 0; ?>
                    @foreach($data as $d)
                        <?php $jumlah+=$d->total; ?>
                    @endforeach
                    <p class="display-4 text-center"> Rp. <?= $jumlah; ?></p>
                    <p class="text-center" style="font-family:roboto;"> Jumlah yang akan didapat permahasiswa : <?php $rata = $jumlah/$mahasiswa ?> <?= $rata; ?></p>
                    <p class="text-center" style="font-family:roboto;"> Jumlah mahasiswa yang akan dibantu :  <?= $mahasiswa; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    
    @include('atribut/footer')

@endsection