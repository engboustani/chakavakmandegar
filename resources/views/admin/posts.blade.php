@extends('masteradmin')

@section('title', 'پست‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">پست‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">پست‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <el-button type="primary" icon="el-icon-circle-plus" onclick="window.location.href = `/admin/post/new`">پست جدید</el-button>
        </div>
        <posts-list></posts-list>
    </div>
@endsection