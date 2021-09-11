<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Rental Apps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link href="{{ url('master/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ url('master/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="{{ url('master/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Rental</b> Apps</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login sebagai admin !</p>
      @error('email')
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
          cek kembali email/password anda !
        </div>
      @enderror
      <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group has-feedback">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-md-4 justify-center">
            <button style="border-radius: 10px" type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div><!-- /.col -->
        </div>
      </form>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.4 -->
  <script src="{{ url('master/plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="{{ url('master/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="{{ url('master/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>