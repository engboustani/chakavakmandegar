@extends('masteradmin')

@section('title', 'زمان ایونت')

@section('content')

    @if (isset($event_id))

    <div class="page-head">
            <h2 class="page-head-title">زمان جدید</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">خانه</a></li>
                <li><a href="/admin/eventtimes">زمان ایونت‌ها</a></li>
                <li class="active">زمان جدید</li>
            </ol>
    </div>    

    @endif

    @if (isset($id))

    <div class="page-head">
        <h2 class="page-head-title">ویرایش زمان</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">خانه</a></li>
            <li><a href="/admin/eventtimes">زمان ایونت‌ها</a></li>
            <li class="active">ویرایش زمان</li>
        </ol>
    </div>
        
    @endif
    <div class="main-content container-fluid">
        @if (isset($id))
        <eventtime :id="{{$id}}"></eventtime>        
        @endif
        @if (isset($event_id))
        <eventtime :event_id="{{$event_id}}"></eventtime>        
        @endif
    </div>
@endsection