@extends('masterclient')

@section('content')
<header class="py-5" style="background-color: #D81B60;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">بلیت‌ها</span></span></h1>
        </div>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="content">
        <tickets-user></tickets-user>
    </div>
</div>

@endsection