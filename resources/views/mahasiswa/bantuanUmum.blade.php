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

    @if(Auth::user()->role_donasi == 1)
    <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6">
    <h4 class="mb-3 ml-4">Selamat anda mendapat bantuan umum</h4>
            <div class="main-card mb-3 card">
                <div class="card-body">
                <p class="mb-2 text-center">Besaran bantuan dana bantuan umum yang anda dapatkan</p>
                    <span class="metismenu-icon pe-7s-cash" style="font-size:260px;margin-left:100px;"></span>
                    <?php $jumlah = 0; ?>
                    @foreach($data as $d)
                        <?php $jumlah+=$d->jumlah_distribusi; ?>
                    @endforeach
                    <p class="display-4 text-center"> Rp. <?= $jumlah; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
    @if(Auth::user()->role_donasi == 0)
    <h4>Bantuan umum akan di distribusikan selama satu bulan sekali kepada mahasiswa yang belum mendapat bantuan langsung dari donatur</h4>
    @endif
    @if(Auth::user()->role_donasi == 2)
    <h4>Anda sudah mendapat bantuan dari donatur</h4>
    @endif
    
    

    @include('atribut/footer')


@endsection