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
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Edit profile Mahasiswa</h5>
                @foreach($d as $data)
                    <form action="/proses_editMhs" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Nama</label>
                            <input name="id" type="hidden" class="form-control" value="{{$data->id}}">
                            <input name="nama" type="text" class="form-control" value="{{$data->nama}}">
                        </div>
                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Email</label>
                            <input name="email_mhs" type="email" class="form-control" value='{{$data->email_mhs}}' readonly>
                        </div>
                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Jurusan</label>
                            <input name="jurusan" type="text" class="form-control" value='{{$data->jurusan}}'>
                        </div>
                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Alamat</label>
                            <input name="alamat" type="text" class="form-control" value='{{$data->alamat_mhs}}'>
                        </div>
                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">No Handphone</label>
                            <input name="nohp_mhs" type="text" class="form-control" value='{{$data->nohp_mhs}}'>
                        </div>
                       
                        <!-- <div class="position-relative form-group"><label for="exampleSelect" class="">Select</label><select name="select" id="exampleSelect" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select></div>
                        <div class="position-relative form-group"><label for="exampleSelectMulti" class="">Select Multiple</label><select multiple="" name="selectMulti" id="exampleSelectMulti" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select></div>
                        <div class="position-relative form-group"><label for="exampleText" class="">Text Area</label><textarea name="text" id="exampleText" class="form-control"></textarea></div> -->

                        <img src="{{asset('assets/images/avatars/' . $data->image_mhs)}}" class="img-thumbnail" alt="">
                        <div class="position-relative form-group">
                        <label for="exampleFile" class="">File</label>
                        <input name="image" type="file" class="form-control-file">

                            <!-- <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</!--> 
                        </div>
                        <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    

    @include('atribut/footer')


@endsection