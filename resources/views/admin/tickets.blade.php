@extends('masteradmin')

@section('title', 'تیکت‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">تیکت‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">تیکت‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <tickets-list></tickets-list>
    </div>
@endsection