@extends('masterclient')

@section('title', 'پلاتو')

@section('content')
    <header class="py-5" style="background-image: url('/img/pelato.jpg')">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">معرفی پلاتو</span></span></h1>
            </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">درباره</h2>
            <p class="pb-3">پلاتو چکاوک از تاریخ 97/1/1 شروع به ساخت شد و در تابستان 97 با اجرا نمایش حقیقت به کارگردانی هادی سکاکی شروع به فعالیت کرد.</p>
        </div>
    </div>

    <section class="py-5 bg-image-full white" style="background-image: url('/img/pelato1.jpg');">
        <div class="container h-100 py-5">
                <div class="content text-center">
                    <h2 class="pb-2 pt-4"><span class="black-background">هدف و برنامه پیش‌رو</span></h2>
                    <p class="pb-1 black-background">
                            مجموعه چکاوک ماندگار در نظر دارد با همکاری و همفکری اساتید و تمامی عزیزانی که در حیطه های مورد فعالیت مجموعه توانایی دارند به تولید آثار هنری و پیشبرد هنر شهر و استان کمک رساند.
                    </p>
                    <p class="black-background">
                            در نظر داریم با هماهنگی و همکاری مجموعه ها و اساتید چه داخل و خارج از شهر و استان برای بروز شدن و بروز بودن هنر کمک کنیم.
                            امیدواریم در این راه خطیر همراه ما باشید.
                                            </p>
                </div>
        </div>
    </section>

    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">برگذار شده‌ها</h2>
            <div class="row">
                <div class="col-sm-3">
                    <img class="rounded px-5 py-3" src="/img/theater3.jpg" style="width: inherit;" />
                    <h5>حقیقت</h5>
                    <p class="pb-3 small">به کارگردانی هادی سکاکی</p>
                </div>
                <div class="col-sm-3">
                    <img class="rounded px-5 py-3" src="/img/theater1.jpg" style="width: inherit;" />
                    <h5>سندرم پای بی‌قرار</h5>
                    <p class="pb-3 small">به کارگردانی عبدالله برجسته</p>
                </div>
                <div class="col-sm-3">
                    <img class="rounded px-5 py-3" src="/img/theater2.jpg" style="width: inherit;" />
                    <h5>مورچه‌ای که راه خانه‌اش را گم کرده بود</h5>
                    <p class="pb-3 small">به کارگردانی حسین لطفی</p>
                </div>
                <div class="col-sm-3">
                    <img class="rounded px-5 py-3" src="/img/theater4.jpg" style="width: inherit;" />
                    <p class="small pb-3">
                        چندین ورکشاپ از جمله گویندگی، فن بیان، خوانندگی و...
                    </p>
                </div>
            </div>  
        </div>
    </div>

@endsection