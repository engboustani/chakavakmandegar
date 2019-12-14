@extends('masterclient')

@section('title', 'پرداخت فاکتور')

@section('content')
<div class="container">
        <div class="content">
                <h1 class="pb-2">پرداخت فاکتور شماره #{{$id}}</h1>
                <pay-factor :factor_id="{{$id}}"></pay-factor>
        </div>
</div>
@endsection