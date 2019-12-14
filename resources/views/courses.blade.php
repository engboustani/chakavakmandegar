@extends('masterclient')

@section('title', 'ورک‌شاپ')

@section('content')
<header class="py-5" style="background-image: url('/img/workshop.jpg')">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">ورک‌شاپ‌ها</span></span></h1>
        </div>
        </div>
    </div>
</header>

        <div class="container">
          <div class="content">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-sm-4 p-2">
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
                </div>           
                @endforeach
            </div>
    
          </div>
        </div>


@endsection