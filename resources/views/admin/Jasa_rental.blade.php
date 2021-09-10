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
      <li class="active">asa Rental</li>
    </ol>
  </section>
@endsection
@section('mainContent')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        @if(session('action'))
          @if(session('sukses'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>	<i class="icon fa fa-check"></i>Sukses !</h4>
                {{ session('msg') }}
              </div>
            @else
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
              Data gagal diperbarui !
            </div>
          @endif
        @endif
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Jasa Rental</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Jasa</th>
                  <th>Username</th>
                  <th>Nomor Telepon</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $datas)
                <tr>
                  <td>{{$datas->fullname}}</td>
                  <td>{{$datas->username}}</td>
                  <td>{{$datas->phone}}</td>
                  <td>{{$datas->email}}</td>
                  <td>{{$datas->address}}</td>
                  @if($datas->status === "on")
                  <td>
                    <label class="label bg-green">Status akun aktif</label>
                    @if($datas->lati !== null && $datas->longi !== null)
                    <a href="{{ route('status',[$datas->id, 'off'])}}"><button class="btn-xs btn-danger" onclick="return konfirmasi()">Off-kan akun ini ?</button></a>
                    @endif
                  </td>
                    @elseif($datas->status === "off")
                  <td>
                    <label class="label bg-red">Status akun belum aktif</label>
                    @if($datas->lati !== null && $datas->longi !== null)
                    <a href="{{ route('status',[$datas->id, 'on'])}}"><button class="btn-xs btn-success" onclick="return konfirmasi()">On-kan akun ini ?</button></a>
                    @endif
                  </td>
                  @endif
                  
                  @if($datas->lati !== null && $datas->longi !== null)
                  <td><label class="label bg-green">Lokasi sudah di input</label></td>
                  @else
                  <td><label class="label bg-red">Lokasi Belum Input</label></td>
                  @endif
                  <td>
                    <a href="{{ route('editJasa', $datas->id)}}"><button class="btn btn-primary">Edit</button></a>
                    <a href="{{ route('resetPwd', $datas->id)}}"><button class="btn btn-warning" onclick="return konfirmasi()">Reset Password</button></a>
                    <a href="{{ route('hapusUser', $datas->id)}}"><button class="btn btn-danger" onclick="return konfirmasi()">Hapus</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $data->links() }}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection