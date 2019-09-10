@extends('masterclient')

@section('title', $event->title)

@section('content')
    
<header class="eventhead py-3" style="background-image: url('/images/87436598465.jpg')">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 text-left">
            <img src="/images/76372368.jpg" class="rounded poster d-flex align-items-end">
            <h1 class="pb-2 white align-items-end"><span class="black-background px-3 py-1">{{ $event->title }}</span></h1>
        </div>
      </div>
    </div>
</header>

<div class="container">
    <div class="content pt-5">
      <div class="content">
        {!! $event->content !!}
      </div>
      <div class="row">
          <h3 class="col-sm-12 p-2"></h2>
          @foreach ($sanse as $san)
          <div class="col-sm-4 p-2">
            <div class="card">
              <div class="card-body">
                <p class="card-text">{{ $san['startday'] }}</p>
                <p class="card-text"><small class="text-muted">ساعت {{ $san['starttime'] }} الی {{ $san['endtime'] }}</small></p>
                <el-button type="success" plain>خرید بلیت</el-button>
              </div>
            </div> 
          </div>           
              
          @endforeach
      </div>
    </div>
</div>

@endsection