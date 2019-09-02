@extends('masteradmin')

@section('title', 'داشبورد')

@section('content')
    <div class="page-head">
        <h2 class="page-head-title">داشبورد</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li class="active">داشبورد</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <users-list></users-list>
    </div>
@endsection