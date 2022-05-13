<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('iziToast-master/dist/css/iziToast.css') }}">
    <script src="{{ asset('iziToast-master/dist/js/iziToast.js') }}"></script>
    <title>Register - Guest Book</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Guest Book</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="{{ route('registeruser_action') }}" method="POST">@csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Username" name="username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">SIGN UP</button>
            <a href="{{ url('login_user') }}" class="btn btn-block btn-warning">SIGN IN</a>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src=" {{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src=" {{ asset('js/popper.min.js') }}"></script>
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src=" {{ asset('js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>