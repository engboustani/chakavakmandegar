@extends('masteradmin')

@section('title', 'پرداختی‌ها')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">پرداختی‌ها</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">پرداختی‌ها</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <payments-list></payments-list>
    </div>
@endsection