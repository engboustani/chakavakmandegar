@extends('masterclient')

@section('content')
    
<header class="eventhead py-3" style="background-color: #78909C">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 text-left">
            @if ($post->thumbnail_model != null)
            <img src="/media/{{ $post->thumbnail_model->address }}" class="rounded poster d-flex align-items-end">                
            @endif
            <h1 class="pb-2 white align-items-end"><span class="black-background px-3 py-1">{{ $post->title }}</span></h1>
            <h5 class="pb-2 white align-items-end"><span class="black-background px-3 py-1">انتشار: {{ jdate($post->created_at)->format('%B %d، %Y %H:%m') }}</span></h5>
        </div>
      </div>
    </div>
</header>

<div class="container">
    <div class="content pt-5">
      <div class="content" style="padding-top: 3rem !important;">
        {!! $post->content !!}
      </div>
    </div>
</div>

@endsection