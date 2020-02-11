@extends('masterclient')

@section('title', 'پرداخت فاکتور')

@section('content')
<div class="container">
    <div class="content">
        <div class="card bg-light mt-5">
            <div class="card-body">
                <h4 class="succ"><i class="el-icon-success top-icon"></i>  پرداخت با موفقیت انجام شد!</h4>
                <div>
                    <h5 class="my-3">بلیت‌ها:</h4>
                    @foreach ($tickets as $ticket)
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    {!! QrCode::size(200)->generate($ticket['code']); !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <h4>شماره تیکت: {{ $ticket['code'] }}</h4>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <h5>نمایش: {{ $ticket['title'] }}</h5>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <h5>سانس: {{ $ticket['startday'] }} ساعت {{ $ticket['starttime'] }} الی {{ $ticket['endtime'] }}</h5>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <h5>نام و نام‌خانوادگی: {{ $ticket['firstname'] }} {{ $ticket['lastname'] }}</h5>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <h5>شماره صندلی: {{ $ticket['seat'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection