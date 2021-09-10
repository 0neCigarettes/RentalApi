@extends('layouts.mainLayout')
@section('headerPage')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengguna
      <small>Jasa Rental</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Pengguna</a></li>
      <li class="active">Jasa Rental</li>
    </ol>
  </section>
@endsection
@section('mainContent')
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Latitude & Longitude</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form  method="POST" action="{{ route('updateJasa', $data->id)}}" >
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="">Nama Jasa</label>
              <input name="fullname" type="text" class="form-control" placeholder="Nama Jasa" value="{{$data->fullname}}" readonly>
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input name="username" type="text" class="form-control" placeholder="Username" value="{{$data->username}}" readonly>
            </div>
            <div class="form-group">
              <label for="">Nomor Telepon</label>
              <input name="phone" type="text" class="form-control" placeholder="Nomor Telepon" value="{{$data->phone}}" readonly>
            </div>
            <div class="form-group">
              <label for="">email</label>
              <input name="email" type="email" class="form-control" placeholder="Email" value="{{$data->email}}" readonly>
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <input name="address" type="text" class="form-control" placeholder="Alamat" value="{{$data->address}}" readonly>
            </div>
            <div class="form-group">
              <label for="">Latitude</label>
              <input name="lati" type="text" class="form-control" placeholder="Latitude" value="{{$data->lati}}" required>
            </div>
            <div class="form-group">
              <label for="">Longitude</label>
              <input name="longi" type="text" class="form-control" placeholder="Longitude" value="{{$data->longi}}" required>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('jasa')}}" type="button" class="btn btn-primary">Kembali</a>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col (left) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection