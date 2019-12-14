@extends('masteradmin')

@section('title', 'لیست ورک‌شاپ‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">لیست ورک‌شاپ‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">لیست ورک‌شاپ‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <courses-list></courses-list>
    </div>
@endsection