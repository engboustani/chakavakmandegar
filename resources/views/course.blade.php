@extends('masterclient')

@section('title', $course->title)

@section('content')
    
<header class="eventhead py-3" style="background-color: #78909C">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 text-left">
            @if ($course->poster_model != null)
            <img src="/media/{{ $course->poster_model->address }}" class="rounded poster d-flex align-items-end">                
            @endif
            <h1 class="pb-2 white align-items-end"><span class="black-background px-3 py-1">{{ $course->title }}</span></h1>
            @if ($course->teacher!='')
            <h4 class="pb-2 white align-items-end"><span class="black-background px-3 py-1">مدرس: {{ $course->teacher }}</span></h4>
            @endif
        </div>
      </div>
    </div>
</header>

<div class="container">
    <div class="content pt-5" style="padding-top: 6rem !important;">
        <div class="content">
            {!! $course->description !!}
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h4>درباره</h4>
            </div>
            <div class="col-12">
                هزینه ثبت‌نام: {{ $course->price == 0 ? 'رایگان' : $course->price.' تومان' }}
            </div>
        </div>
    <course-signup :course_id="{{$course->id}}" @isset($gosign) :gosign="true" @endisset @isset($error) :error="true" @endisset></course-signup>
    </div>
</div>

@endsection