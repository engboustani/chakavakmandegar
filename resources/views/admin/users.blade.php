@extends('masteradmin')

@section('title', 'کاربران')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">کاربران</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">کاربران</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <el-button type="primary" icon="el-icon-circle-plus">کاربر جدید</el-button>
        </div>
        <users-list></users-list>
    </div>
@endsection