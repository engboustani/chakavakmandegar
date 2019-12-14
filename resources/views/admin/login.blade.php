<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مدیریت چکاوک ماندگار - ورود</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="assets/img/logo-xx.png" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">خواهشا مشخصات کاربری خود را وارد کنید.</span></div>
              <div class="panel-body">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <input id="username" type="text" name="login" placeholder="نام کاربری" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password" type="password" name="password" placeholder="رمز عبور" class="form-control">
                  </div>
                  <div class="form-group row login-tools">
                    <div class="col-xs-6 login-remember">
                      <div class="be-checkbox">
                        <input type="checkbox" id="remember" name="remember_me">
                        <label for="remember">مرا به خاطر بسپار</label>
                      </div>
                    </div>
                    <div class="col-xs-6 login-forgot-password"><a href="#">رمز را فراموش کرده‌اید؟</a></div>
                  </div>
                  <div class="form-group login-submit">
                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">ورود</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/js/app.js" lang="text/javascript"></script>
  </body>
</html>