<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گیشه چکاوک ماندگار - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
</head>
<body dir="rtl">
        <div class="be-wrapper" id="app">
                <!-- As a link -->
                <nav class="navbar navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="#">مدیریت گیشه</a>
                </nav>
                <div class="be-left-sidebar">
                    <el-menu
                        default-active="2"
                        class="el-menu-vertical-demo"
                        @open="handleOpen"
                        @close="handleClose">
                        <el-menu-item index="1">
                            <i class="el-icon-menu"></i>
                            <span>داشبورد</span>
                        </el-menu-item>
                        <el-menu-item index="2">
                            <i class="el-icon-document"></i>
                            <span>ایونت‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="3">
                            <i class="el-icon-user-solid"></i>
                            <span>کاربران</span>
                        </el-menu-item>
                        <el-menu-item index="4">
                            <i class="el-icon-s-ticket"></i>
                            <span>تیکت‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="5">
                            <i class="el-icon-s-management"></i>
                            <span>فاکتور‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="6">
                            <i class="el-icon-setting"></i>
                            <span>تنظیمات</span>
                        </el-menu-item>
                      </el-menu>
                </div>
                <div class="be-content">
                  @yield('content')
                </div>
              </div>    
    <script src="/js/app.js" lang="text/javascript"></script>
  </body>
  <!--- [It's Hossein the hacker bitches] --->
</html>