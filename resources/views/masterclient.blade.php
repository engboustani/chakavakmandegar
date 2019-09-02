<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گیشه چکاوک ماندگار - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body dir="rtl">
  <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">گیشه چکاوک ماندگار</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/">خانه</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/shows">نمایش‌ها</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 nav-search" type="search" placeholder="جست‌‌وجو" aria-label="جست‌‌وجو">
                    <el-button class="mr-2" icon="el-icon-search" circle></el-button>
                    <navbar-button></navbar-button>
                  </form>
                </div>
              </nav>
              <div class="container">
                <div class="content">
    @yield('content')

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
              <div class="col-12 col-md">
                <img class="mb-2" src="..." alt="..." width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2017-2018</small>
              </div>
              <div class="col-6 col-md">
                <h5>ویژگی‌ها</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">نمایش‌ها</a></li>
                  <li><a class="text-muted" href="#">بلیت‌ها</a></li>
                  <li><a class="text-muted" href="#">فاکتور‌ها</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>منابع</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">نحوه خرید</a></li>
                  <li><a class="text-muted" href="#">چاپ بلیت</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>درباره ما</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">تیم</a></li>
                  <li><a class="text-muted" href="#">موقعیت</a></li>
                  <li><a class="text-muted" href="#">قوانین</a></li>
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