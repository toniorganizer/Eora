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
      <div class="col-md-6 col-xl-4">
          <div class="card mb-3 widget-content bg-midnight-bloom">
              <div class="widget-content-wrapper text-white">
                  <div class="widget-content-left">
                      <div class="widget-heading">{{Auth::user()->name}}</div>
                      <div class="widget-subheading">Total mahasiswa yang mendaftar</div>
                  </div>
                  <div class="widget-content-right">
                      <div class="widget-numbers text-white"><span> {{$student}}
                      </span></div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </div>


@endsection