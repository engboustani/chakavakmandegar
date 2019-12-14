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
    <title>مدیریت چکاوک ماندگار - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
</head>
<body dir="rtl">
        <div class="be-wrapper" id="app">
                <!-- As a link -->
                <nav class="navbar navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="#">مدیریت چکاوک ماندگار</a>
                </nav>
                <div class="be-left-sidebar">
                    <sidebar-admin></sidebar-admin>
                </div>
                <div class="be-content">
                  @yield('content')
                </div>
              </div>    
    <script src="/js/app.js" lang="text/javascript"></script>
  </body>
  <!--- [It's Hossein the hacker bitches] --->
</html>