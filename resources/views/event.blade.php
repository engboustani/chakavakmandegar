@extends('masterclient')

@section('title', $event->title)

@section('content')
    

<h1 class="pb-2">{{ $event->title }}</h1>
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


@endsection