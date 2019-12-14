@extends('masterclient')

@section('title', 'ثبت نام')

@section('content')
<div class="container">
        <div class="content">
                <h1 class="pb-2">فرم ثبت‌نام</h1>
                <signup-form csrftoken="{{ $csrf_token }}"></signup-form>
        </div>
</div>
@endsection