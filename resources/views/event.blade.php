@extends('masterclient')

@section('title', $event->title)

@section('content')
  
@if ($event->header_model != null)
<header class="eventhead py-3" style="background-image: url('/media/{{ $event->header_model->address }}');">    
@else
<header class="eventhead py-3" style="background-color: #9FA8DA;">
@endif
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 text-left">
            @if ($event->thumbnail_model != null)
            <img src="/media/{{ $event->thumbnail_model->address }}" class="rounded poster d-flex align-items-end">                
            @endif
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
      </div>
      <div class="row">
        <h4 class="p-2 my-4">سانس‌ها</h4>
      </div>
      <div class="row">
          @foreach ($sanse as $san)
          <div class="col-sm-4 p-2">
            <div class="card">
              <div class="card-body">
                <p class="card-text">{{ $san['startday'] }}</p>
                <p class="card-text"><small class="text-muted">ساعت {{ $san['starttime'] }} الی {{ $san['endtime'] }}</small></p>
                <a class="btn btn-outline-success {{ $san['disable'] ? 'disabled' : ''}}" href="/shop/{{ $san['id'] }}" role="button" {{ $san['disable'] ? 'aria-disabled=true' : ''}}>خرید بلیت</a>
              </div>
            </div> 
          </div>           
              
          @endforeach
      </div>
    </div>
</div>

@endsection