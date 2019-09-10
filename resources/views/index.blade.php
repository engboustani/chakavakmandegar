@extends('masterclient')

@section('title', 'صفحه نخست')

@section('content')
  <!-- Header - set the background image for the header in the line below -->
  <header class="masthead py-5">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12 text-right">
            <img src="/img/logo.svg" class="rounded img-fluid d-block ml-auto logo shadow-svg mb-3" alt="...">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">استودیو چکاوک ماندگار</span></span></h1>
            <p class="lead white home-title font-weight-bold"><span class="p-2"><span class="black-background">اولین و تخصصی ترین استودیو نیشابور</span></span></p>
          </div>
        </div>
      </div>
  </header>

        <div class="container">
          <div class="content">
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
    
          </div>
        </div>


@endsection