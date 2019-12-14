@extends('masteradmin')

@section('title', 'صفحه')

@section('content')
    @if ($id == 0)

    <div class="page-head">
            <h2 class="page-head-title">صفحه جدید</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">خانه</a></li>
                <li><a href="/admin/pages">صفحه‌ها</a></li>
                <li class="active">صفحه جدید</li>
            </ol>
    </div>    
        
    @else
    <div class="page-head">
        <h2 class="page-head-title">ویرایش صفحه</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/pages">صفحه‌ها</a></li>
            <li class="active">ویرایش صفحه</li>
        </ol>
    </div>
        
    @endif
    <div class="main-content container-fluid">
        <page :id="{{ $id }}"></page>
    </div>
@endsection