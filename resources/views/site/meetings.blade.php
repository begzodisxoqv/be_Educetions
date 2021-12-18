@extends('layouts.app')
@section('content')
@foreach($metbanners as $metbanner )
  <section class="heading-page header-text"style="background: url({{ asset('storage/' . $metbanner->{'image'}) }})" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>{{ $metbanner->{ 'title_' . $locale } }}</h6>
          <h2>{{ $metbanner->{ 'text_' . $locale } }}</h2>
        </div>
      </div>
    </div>
  </section>
@endforeach
  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="filters">
                <ul>  
                  <li id="nav-all-tab"  data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true" data-filter="*"  class="active"> @lang('main.all meetings')</li>
                  <li id="nav-soon-tab" data-toggle="tab" href="#nav-soon" role="tab" aria-controls="nav-soon" aria-selected="false" data-filter=".soon">@lang('main.soon')</li>
                  <li id="nav-imp-tab" data-toggle="tab" href="#nav-imp" role="tab" aria-controls="nav-imp" aria-selected="false" data-filter=".imp">@lang('main.importent')</li>
                  <li id="nav-att-tab" data-toggle="tab" href="#nav-att" role="tab" aria-controls="nav-att" aria-selected="false" data-filter=".att"> @lang('main.attractive')</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row grid">
           @foreach($soon as $soon )
                <div class="col-lg-4 templatemo-item-col all soon ">
                  <div class="meeting-item">
                    <div class="thumb">
                      <div class="price">
                        <span>{{ $soon->price }}</span>
                      </div>
                      <a href="{{ route('meetingsDetail', $soon) }}"><img src="{{ asset('storage/' . $soon->image) }}" alt=""></a>
                    </div>
                    <div class="down-content">
                      <div class="date">
                        <h6>{{ $soon->type  }} <span>{{ $soon->data }}</span></h6>
                      </div>
                      <a href="{{ route('meetingsDetail', $soon) }}"><h4>{{ $soon->{'title_'. $locale } }}</h4></a>
                      <p> {!! \Illuminate\Support\Str::words($upcomments->{'text' . $locale}, 3) !! </p>
                    </div>
                  </div>
                </div>
           @endforeach
           @foreach($imp as $imp )
                <div class="col-lg-4 templatemo-item-col all imp ">
                  <div class="meeting-item">
                    <div class="thumb">
                      <div class="price">
                        <span>{{ $imp->price }}</span>
                      </div>
                      <a href="{{ route('meetingsDetail', $imp) }}"><img src="{{ asset('storage/' . $imp->image) }}" alt=""></a>
                    </div>
                    <div class="down-content">
                      <div class="date">
                        <h6>{{ $imp->type  }} <span>{{ $imp->data }}</span></h6>
                      </div>
                      <a href="{{ route('meetingsDetail', $imp) }}"><h4>{{ $imp->{'title_'. $locale } }}</h4></a>
                      <p>{!! \Illuminate\Support\Str::words($upcomments->{'text' . $locale}, 3) !! </p>
                    </div>
                  </div>
                </div>
           @endforeach
           @foreach($att as $att )
                <div class="col-lg-4 templatemo-item-col all att">
                  <div class="meeting-item">
                    <div class="thumb">
                      <div class="price">
                        <span>{{ $att->price }}</span>
                      </div>
                      <a href="{{ route('meetingsDetail', $att) }}"><img src="{{ asset('storage/' . $att->image) }}" alt=""></a>
                    </div>
                    <div class="down-content">
                      <div class="date">
                        <h6>{{ $att->type  }} <span>{{ $att->data }}</span></h6>
                      </div>
                      <a href="{{ route('meetingsDetail', $att) }}"><h4>{{ $att->{'title_'. $locale } }}</h4></a>
                      <p>{!! \Illuminate\Support\Str::words($upcomments->{'text' . $locale}, 3) !!</p>
                    </div>
                  </div>
                </div>
           @endforeach               
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com/page/1" target="_parent" title="website templates">TemplateMo</a></p>
    </div>
  </section>
  
@endsection