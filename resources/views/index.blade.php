@extends('masterclient')

@section('title', 'صفحه نخست')

@section('content')
        <main-slider></main-slider>

        <h1 class="pb-2 pt-4">نمایش‌ها</h1>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-sm-4 p-2">
              <div class="card">
                <img src="/img/gallery/img{{ $event->id }}.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $event->title }}</h5>
                  <p class="card-text">{{ str_limit($event->summery, $limit = 60, $end = '...') }}</p>
                  <a href="/event/{{ $event->id }}" class="el-button el-button--primary is-round">بیشتر</a>
                </div>
              </div> 
            </div>           
            @endforeach
        </div>
        <h1 class="pb-2 pt-4">پست‌ها</h1>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-sm-4 p-2">
              <div class="card">
                <img src="/img/gallery/img{{ $event->id }}.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $event->title }}</h5>
                  <p class="card-text">{{ str_limit($event->summery, $limit = 60, $end = '...') }}</p>
                  <a href="/event/{{ $event->id }}" class="el-button el-button--primary is-round">بیشتر</a>
                </div>
              </div> 
            </div>           
            @endforeach
        </div>

@endsection