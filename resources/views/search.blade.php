@extends('masterclient')

@section('title', 'جست‌وجو')

@section('content')
<header class="py-5" style="background-color: #7E57C2;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">جست‌وجو</span></span></h1>
        </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="content pt-5">
        <h4>جست‌وجو درباره: {{$q}}</h4>
        @if (!$count)
            <h5>نتیجه‌ای پیدا نشد!</h5>
        @else
            <h5>{{$count}} نتیجه پیدا شد</h5>            
        @endif

        @if (count($events) > 0)
        <h5>نمایش‌ها</h5>
        <div class="card-columns">
        @foreach ($events as $event)
            <div class="card">
                <a href="/event/{{ $event->id }}"><img src="/media/{{ $event->thumbnail_model->address }}" class="card-img-top" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-text">{{ str_limit($event->summery, $limit = 60, $end = '...') }}</p>
                    <a href="/event/{{ $event->id }}" class="el-button el-button--primary is-round">بیشتر</a>
                </div>
            </div>
        @endforeach  
        </div> 
        @endif

        @if (count($courses) > 0)
        <h5>ورک‌شاپ‌ها</h5>
        <div class="card-columns">
        @foreach ($courses as $course)
            <div class="card">
                @if ($course->poster_model != null)
                <a href="/course/{{ $course->id }}"><img src="/media/{{ $course->poster_model->address }}" class="card-img-top" alt="..." /></a>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    @if (isset($course->teacher))
                    <p><small>مدرس:</small> {{ $course->teacher }}</p>                          
                    @endif
                    <p><small>هزینه ثبت‌نام:</small> {{ $course->price == 0 ? 'رایگان' : $course->price.' تومان' }}</p>
                    <p><small>آخرین مهلت:</small> {{ jdate($course->limitTime)->format('%B %d، %Y') }}</p>
                    <a href="/course/{{ $course->id }}" class="el-button el-button--primary is-round">بیشتر</a>
                </div>
            </div> 
        @endforeach  
        </div> 
        @endif

        @if (count($posts) > 0)
        <h5>نمایش‌ها</h5>
        <div class="card-columns">
        @foreach ($posts as $post)
            <div class="card p-2">
                @if ($post->thumbnail_model != null)
                <a href="/post/{{ $post->id }}"><img src="/media/{{ $post->thumbnail_model->address }}" class="card-img-top" alt="..." /></a>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{!! str_limit($post->content, $limit = 60, $end = '...') !!}</p>
                    <div class="row">
                    <a href="/post/{{ $post->id }}" class="el-button el-button--primary is-round">بیشتر</a>
                    </div>
                </div>
            </div> 
        @endforeach  
        </div> 
        @endif


    </div>
</div>

@endsection