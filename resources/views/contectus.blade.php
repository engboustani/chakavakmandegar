@extends('masterclient')

@section('title', 'تماس‌باما')

@section('content')
    <header class="py-5" style="background-image: url('/img/contectus.jpg')">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">تماس‌باما</span></span></h1>
            </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">آدرس ما</h2>
            <p class="pb-3">منوچهری جنوبی 13، پلاک 22</p>
        </div>
    </div>

    <google-map></google-map>

    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">شماره‌های تماس</h2>
            <p class="pb-3">051436667644</p>
        </div>
    </div>

@endsection