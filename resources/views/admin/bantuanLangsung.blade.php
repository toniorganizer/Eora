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
    <div class="col-md-6">
        <h3 class="text-center">Bantuan Langsung</h3>
        <p class="text-center">Jumlah saluran bantuan langsung dari donatur</p>
    </div>
    </div>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                   <p class="mb-2 text-center">Bantuan langsung yang disalurkan oleh donatur untuk mahasiswa</p>
                    <span class="metismenu-icon pe-7s-cash" style="font-size:260px;margin-left:100px;"></span>
                    <!--  -->
                    <p class="display-4 text-center"> Rp. </p>                    
                </div>
            </div>
        </div>
    </div>
    
    @include('atribut/footer')

@endsection