@extends('masteradmin')

@section('title', 'تنظیمات سالن')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">تنظیمات سالن</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/posts">تنظیمات</a></li>
            <li class="active">سالن</li>
        </ol>
    </div>
        
    <div class="main-content container-fluid">
        <setting-salon></setting-salon>
    </div>
@endsection