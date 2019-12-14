@extends('masterclient')

@section('title', 'نمایش‌ها')

@section('content')
<header class="py-5" style="background-image: url('/img/shows.jpg')">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">نمایش‌ها</span></span></h1>
        </div>
        </div>
    </div>
</header>

        <div class="container">
          <div class="content">
            <div class="row">
                @foreach ($events as $event)
                <div class="col-sm-4 p-2">
                  <div class="card">
                      @if ($event->thumbnail_model != null)
                      <a href="/event/{{ $event->id }}"><img src="/media/{{ $event->thumbnail_model->address }}" class="card-img-top" alt="..." /></a>
                      @endif
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