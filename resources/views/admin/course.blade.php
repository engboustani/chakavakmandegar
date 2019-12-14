@extends('masteradmin')

@section('title', 'ورک‌شاپ')

@section('content')
    @if ($id == 0)

    <div class="page-head">
            <h2 class="page-head-title">ورک‌شاپ جدید</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">خانه</a></li>
                <li><a href="/admin/event">ورک‌شاپ‌ها</a></li>
                <li class="active">ورک‌شاپ جدید</li>
            </ol>
    </div>    
        
    @else
    <div class="page-head">
        <h2 class="page-head-title">ویرایش ورک‌شاپ</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/event">ورک‌شاپ‌ها</a></li>
            <li class="active">ویرایش ورک‌شاپ</li>
        </ol>
    </div>
        
    @endif
    <div class="main-content container-fluid">
        <course :id="{{ $id }}"></course>
    </div>
@endsection