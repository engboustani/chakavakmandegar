@extends('masteradmin')

@section('title', 'ایونت‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">ایونت‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">ایونت‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <el-button type="primary" icon="el-icon-circle-plus">ایونت جدید</el-button>
        </div>
        <events-list></events-list>
    </div>
@endsection