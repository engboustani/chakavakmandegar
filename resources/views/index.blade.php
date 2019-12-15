@extends('masterclient')

@section('title', 'صفحه نخست')

@section('content')
  <!-- Header - set the background image for the header in the line below -->
      <div class="row align-items-center">
          <div class="col-sm-6 text-right zoomheader vh-100 px-3 align-items-center studiohead zoom-in">
            <div class="row mt-5 px-3" style="display: block;">
              <img src="/img/logo.svg" class="rounded img-fluid d-block ml-auto logo shadow-svg mb-3 mr-5" alt="...">
              <h1 class="font-weight-light white home-title font-weight-bold mr-5"><span class="p-2"><span class="black-background">استودیو چکاوک ماندگار</span></span></h1>
              <p class="lead white home-title font-weight-bold mr-5"><span class="p-2"><span class="black-background">اولین و تخصصی ترین استودیو نیشابور</span></span></p>
              <p class=" mr-5"><a class="btn btn-light" href="/studio" role="button">بیشتر</a></p>    
            </div>
          </div>
          <div class="col-sm-6 text-right zoomheader vh-100 px-3 align-items-center theaterhead zoom-in">
              <div class="row mt-5 px-3" style="display: block;">
                <img src="/img/pelato.svg" class="rounded img-fluid d-block ml-auto logo shadow-svg mb-3 mr-5" alt="...">
                <h1 class="font-weight-light white home-title font-weight-bold mr-5"><span class="p-2"><span class="black-background">پلاتو چکاوک ماندگار</span></span></h1>
                <p class="lead white home-title font-weight-bold mr-5"><span class="p-2"><span class="black-background">اولین سالن نمایش اختصاصی نیشابور</span></span></p>
                <p class=" mr-5"><a class="btn btn-light" href="/pelato" role="button">بیشتر</a></p>
              </div>
          </div>
      </div>
      <widget-home-login></widget-home-login>


@endsection