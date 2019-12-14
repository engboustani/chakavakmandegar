<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Morilog\Jalali\CalendarUtils;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class ViewController extends Controller
{
    use SEOToolsTrait;
    //
    public function index()
    {
        $this->seo()->setTitle('صفحه نخست');

        $events = \App\Event::where('indexed', true)->get();
        $posts = \App\Post::where('visiable', true)->limit(3)->get();
        return view('index', ['events' => $events, 'posts' => $posts]);
    }

    public function studio()
    {
        $this->seo()->setTitle('استودیو');
        return view('studio');
    }

    public function pelato()
    {
        $this->seo()->setTitle('پلاتو');
        return view('pelato');
    }

    public function posts()
    {
        $this->seo()->setTitle('پست‌ها');
        $posts = \App\Post::where('visiable', true)->orderBy('created_at', 'desc')->get();
        return view('posts', ['posts' => $posts]);
    }

    public function postsCategory($category)
    {
        $this->seo()->setTitle('پست‌ها');
        $posts = \App\Post::where('visiable', true)->orderBy('created_at', 'desc')->get();
        return view('posts', ['posts' => $posts]);
    }
    
    public function shows()
    {
        $this->seo()->setTitle('نمایش‌ها');
        $events = \App\Event::where('indexed', true)->orderBy('created_at', 'desc')->get();
        return view('shows', ['events' => $events]);
    }

    public function courses()
    {
        $this->seo()->setTitle('ورک‌شاپ');
        $courses = \App\Course::where('indexed', true)->orderBy('created_at', 'desc')->get();
        return view('courses', ['courses' => $courses]);
    }

    public function contectus()
    {
        $this->seo()->setTitle('تماس‌با‌ما');
        return view('contectus');
    }

    public function rules()
    {
        $this->seo()->setTitle('قوانین');
        return view('rules');
    }
    
    public function search(Request $request)
    {
        $q = $request->input('q');
        $posts = \App\Post::where('title','LIKE','%'.$q.'%')->orWhere('content','LIKE','%'.$q.'%')->orderBy('created_at', 'desc');
        $courses = \App\Course::where('title','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->orderBy('created_at', 'desc');
        $events = \App\Event::where('title','LIKE','%'.$q.'%')->orWhere('content','LIKE','%'.$q.'%')->orderBy('created_at', 'desc');
        $count = $posts->count() + $courses->count() + $events->count();
        $this->seo()->setTitle('جست‌وجو');
        return view('search', ['q' => $q, 'count' => $count, 'posts' => $posts->get(), 'courses' => $courses->get(), 'events' => $events->get()]);
    }
    
    public function login()
    {
        $this->seo()->setTitle('ورود');
        return view('login');
    }

    public function howto()
    {
        $this->seo()->setTitle('نحوه خرید');
        return view('howto');
    }

    public function tickets()
    {
        $this->seo()->setTitle('بلیت‌ها');
        return view('tickets');
    }

    public function payments()
    {
        $this->seo()->setTitle('پرداختی‌ها');
        return view('payments');
    }

    public function event($id)
    {
        $event = \App\Event::find($id);
        $this->seo()->setTitle($event->title);
        $sanse = array();
        foreach ($event->eventtimes as $eventtime) {
            $startday = Jalalian::forge($eventtime->start)->format('%A, %d %B %y');
            $startday = CalendarUtils::convertNumbers($startday);
            $starttime = Jalalian::forge($eventtime->start)->format('%H:%M');
            $starttime = CalendarUtils::convertNumbers($starttime);
            $endtime = Jalalian::forge($eventtime->end)->format('%H:%M');
            $endtime = CalendarUtils::convertNumbers($endtime);
            if($eventtime->deadline < Carbon::now())
                $disable = true;
            else
                $disable = false;
            array_push($sanse, array('id' => $eventtime->id, 'startday' => $startday, 'starttime' => $starttime, 'endtime' => $endtime, 'disable' => $disable));
        }
        return view('event', ['event' => $event, 'sanse' => $sanse]);
    }

    public function course(Request $request, $id)
    {
        $course = \App\Course::find($id);
        $this->seo()->setTitle($course->title);
        if ($request->input('gosign')) {
            return view('course', ['course' => $course, 'gosign' => true]);
        }
        if ($request->input('error')) {
            return view('course', ['course' => $course, 'error' => true]);
        }

        return view('course', ['course' => $course]);
    }

    public function post($id)
    {
        $post = \App\Post::find($id);
        $this->seo()->setTitle($post->title);

        return view('post', ['post' => $post]);
    }

    public function signup()
    {
        $this->seo()->setTitle('ثبت نام');
        if (!Auth::check())
            return view('signup', ['csrf_token' => csrf_token()]);
        else
            return redirect('/');
    }

    public function printticket(Request $request)
    {
        return view('printticket');
    }

    public function paymentfailed()
    {
        return view('paymentfailed');
    }
}
