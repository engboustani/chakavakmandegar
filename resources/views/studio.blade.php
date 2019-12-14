@extends('masterclient')

@section('title', 'استودیو')

@section('content')
    <header class="py-5" style="background-image: url('/img/studio.jpg')">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">معرفی استودیو</span></span></h1>
            </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">فعالیت‌ها</h2>
            <p class="pb-3">حیطه اصلی فعالیت استودیو با نام (تهیه و تولید آثار صوتی) می‌باشد.
                اما فعالیت‌هایی که تا کنون در این مجموعه موفق به انجام آن بوده‌ایم :</p>
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <h5>ضبط، میکس و مستر</h5>
                    <p class="pb-3 small">انواع موزیک</p>
                </div>
                <div class="col-sm-3">
                    <h5>آهنگسازی و تنظیم موزیک</h5>
                    <p class="pb-3 small">در سبک های مختلف</p>
                </div>
                <div class="col-sm-3">
                    <h5>تهیه انواع تیزر</h5>
                    <p class="pb-3 small">صوتی و تبلیغاتی</p>
                </div>
                <div class="col-sm-3">
                    <h5>تهیه و تولید موسیقی</h5>
                    <p class="pb-3 small">برای مجالس مناسبتی از جمله (تولد، عروسی، نامزدی و... )</p>
                </div>
                <div class="col-sm-3">
                    <h5>برگزاری ورکشاپ</h5>
                    <p class="pb-3 small">با موضوعات فن بیان، گویندگی، خوانندگی و...</p>
                </div>    
            </div>  
        </div>
    </div>
    <section class="py-5 bg-image-full white" style="background-image: url('/img/studio1.jpg')">
        <div class="container">
            <div class="content text-center">
                    <h2 class="pb-2 pt-4"><span class="black-background">تاریخچه</span></h2>
                    <p class="pb-1 black-background">شروع فعالیت استودیو از سال 1386 بوده که در ابتدا به یک استودیو خانگی محدود و با امکانات و اطلاعات کم به فعالیتش ادامه داد.
                        نام اولی که برای استودیو انتخاب شده بود (کُرال استودیو) بود که به معنی هم خوانی بود.
                    </p>
                    <p class="black-background">
                        در سال 95 بصورت رسمی و با کسب مجوز از وزارت فرهنگ و ارشاد اسلامی به استودیو چکاوک ماندگار تغییر نام داد و همکنون در خدمت هنرمندان عزیز است.
                    </p>
        
            </div>

        </div>
    </section>


    <div class="container">
        <div class="content text-center py-5">
            <h2 class="pb-2 pt-4">تیم ما</h2>
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <img class="rounded-circle px-5 py-3" src="/img/faramarz.jpg" style="width: inherit;" />
                    <h5>فرامرز فضلی</h5>
                    <p class="small">موسس و بنیان‌گذار</p>
                    <p class="pb-3 small">مدیر کل</p>
                </div>
                <div class="col-sm-3">
                    <img class="rounded-circle px-5 py-3" src="/img/soheil.jpg" style="width: inherit;" />
                    <h5>سهیل قربانی</h5>
                    <p class="pb-3 small">مدیریت داخلی</p>
                </div>
            </div>  
        </div>
    </div>

@endsection