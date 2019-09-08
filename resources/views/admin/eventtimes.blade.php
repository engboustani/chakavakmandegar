@extends('masteradmin')

@section('title', 'لیست زمان‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">لیست زمان‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">لیست زمان‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <eventtimes-list></eventtimes-list>
    </div>
@endsection