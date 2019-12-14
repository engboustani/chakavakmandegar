@extends('masterclient')

@section('title', 'اخبار')

@section('content')
<header class="py-5" style="background-image: url('/img/posts.jpg')">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">اخبار</span></span></h1>
        </div>
        </div>
    </div>
</header>

        <div class="container">
          <div class="content">
            <div class="row">
                <div class="col-sm-2">
                    <h5 class="my-3">دسته بندی</h5>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts" aria-controls="v-pills-home" aria-selected="true">همه</a>
                        <a class="nav-link {{ Request::is('posts/studio') ? 'active' : '' }}" href="/posts/studio" aria-controls="v-pills-profile" aria-selected="false">استودیو</a>
                        <a class="nav-link {{ Request::is('posts/pelato') ? 'active' : '' }}" href="/posts/pelato" aria-controls="v-pills-messages" aria-selected="false">پلاتو</a>
                        <a class="nav-link {{ Request::is('posts/other') ? 'active' : '' }}" href="/posts/other" aria-controls="v-pills-settings" aria-selected="false">متفرقه</a>
                    </div>
                </div>
                <div class="col-sm-10">
                  <div class="card-columns mt-3">
                    @foreach ($posts as $post)
                    <div class="card p-2">
                      @if ($post->thumbnail_model != null)
                      <a href="/post/{{ $post->id }}"><img src="/media/{{ $post->thumbnail_model->address }}" class="card-img-top" alt="..." /></a>
                      @endif
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! str_limit($post->content, $limit = 60, $end = '...') !!}</p>
                        <div class="row">
                          <a href="/post/{{ $post->id }}" class="el-button el-button--primary is-round">بیشتر</a>
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