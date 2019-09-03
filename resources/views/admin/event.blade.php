@extends('masteradmin')

@section('title', 'ایونت')

@section('content')
    @if ($id == 0)

    <div class="page-head">
            <h2 class="page-head-title">ایونت جدید</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">خانه</a></li>
                <li><a href="/admin/event">ایونت‌ها</a></li>
                <li class="active">ایونت جدید</li>
            </ol>
    </div>    
        
    @else
    <div class="page-head">
        <h2 class="page-head-title">ویرایش ایونت</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/event">ایونت‌ها</a></li>
            <li class="active">ویرایش ایونت</li>
        </ol>
    </div>
        
    @endif
    <div class="main-content container-fluid">
        <event :id="{{ $id }}"></event>
    </div>
@endsection