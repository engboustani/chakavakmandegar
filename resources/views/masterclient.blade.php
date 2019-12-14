<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147395948-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-147395948-1');
    </script>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body dir="rtl" style="padding-top: 58px;">
  <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="/">چکاوک ماندگار</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                      <a class="nav-link" href="/">خانه</a>
                    </li>
                    <li class="nav-item {{ Request::is('studio') ? 'active' : '' }}">
                      <a class="nav-link" href="/studio">استودیو</a>
                    </li>
                    <li class="nav-item {{ Request::is('pelato') ? 'active' : '' }}">
                      <a class="nav-link" href="/pelato">پلاتو</a>
                    </li>
                    <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                      <a class="nav-link" href="/courses">ورک‌شاپ</a>
                    </li>
                    <li class="nav-item {{ Request::is('posts') ? 'active' : '' }}">
                      <a class="nav-link" href="/posts">اخبار</a>
                    </li>
                    <li class="nav-item {{ Request::is('shows') ? 'active' : '' }}">
                      <a class="nav-link" href="/shows">نمایش‌ها</a>
                    </li>
                    <li class="nav-item {{ Request::is('contect-us') ? 'active' : '' }}">
                      <a class="nav-link" href="/contect-us">تماس‌با‌ما</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0" action="/search" method="GET">
                    <input class="form-control mr-sm-2 nav-search" type="search" name="q" placeholder="جست‌‌وجو" aria-label="جست‌‌وجو">
                    <el-button class="mr-2" icon="el-icon-search" native-type="submit" circle></el-button>
                    <navbar-button></navbar-button>
                  </form>
                </div>
              </nav>
    @yield('content')
    <div class="container">
      <div class="content">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
          <div class="row">
            <div class="col-12 col-md">
              <img class="mb-2" src="/img/mainlogo.jpg" height="70">
              <img class="mb-2" src="/img/pelatologo.jpg" height="70">
              <small class="d-block mb-3 text-muted">چکاوک ماندگار© 2017-2018</small>
              <small class="d-block mb-3 text-muted">طراحی و پیاده‌سازی حکیم‌رایانه</small>
            </div>
            <div class="col-6 col-md">
              <h5>ویژگی‌ها</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="/shows">نمایش‌ها</a></li>
                <li><a class="text-muted" href="/tickets">بلیت‌ها</a></li>
                <li><a class="text-muted" href="/payments">پرداختی‌ها</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>منابع</h5>
              <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="/posts">پست‌ها</a></li>
                  <li><a class="text-muted" href="/howto">نحوه خرید</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>درباره ما</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="/studio">استودیو</a></li>
                <li><a class="text-muted" href="/pelato">پلاتو</a></li>
                <li><a class="text-muted" href="/rules">قوانین</a></li>
                <li><a class="text-muted" href="/contect-us">تماس‌باما</a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>
      <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <login-modal></login-modal>
      </div>
      <div class="modal fade" id="creditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <add-credit></add-credit>
      </div>
  </div>
    <script src="/js/app.js" lang="text/javascript"></script>
  </body>
  <!--- [It's Hossein the hacker bitches] --->
</html>