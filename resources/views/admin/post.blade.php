@extends('masteradmin')

@section('title', 'پست')

@section('content')
    @if ($id == 0)

    <div class="page-head">
            <h2 class="page-head-title">پست جدید</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">خانه</a></li>
                <li><a href="/admin/posts">پست‌ها</a></li>
                <li class="active">پست جدید</li>
            </ol>
    </div>    
        
    @else
    <div class="page-head">
        <h2 class="page-head-title">ویرایش پست</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/posts">پست‌ها</a></li>
            <li class="active">ویرایش پست</li>
        </ol>
    </div>
        
    @endif
    <div class="main-content container-fluid">
        <post :id="{{ $id }}"></post>
    </div>
@endsection