@extends('masterclient')

@section('title', 'خرید بلیت')

@section('content')
<div class="container">
        <div class="content">
                <h1 class="pb-2">خرید بلیت</h1>
                <ticket-shop :eventtime_id="{{$id}}"></ticket-shop>
        </div>
</div>
@endsection