
@extends('layouts.app')
@section('content')
  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <rdiv class="col-lg-12">
          <h6> @lang('main.get all detals')</h6>
          <h2> @lang('main.online teaching and learning toools')</h2>
        </rdiv>
      </div>
    </div>
  </section>
  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>{{ $slug->price }}</span>
                  </div>
                  <div class="date">
                    <h6>{{ $slug->type }} <span>{{ $slug->data}}</span></h6>
                  </div>
                  <a href=""><img style="height: 400px;" src="{{ asset('storage/' . $slug->image) }}" alt=""></a>
                </div>
                <div class="down-content">
                  <a href=""><h4>{!! $slug->{'title_' . $locale}!!}</h4></a>
                  <p></p>
                 <br> <p  class="deson">  {!! $slug->{'text_' . $locale} !!}  </p><br><br><br>  
                 @foreach($logotechs as $logotech)              
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="hours">
                        <h5>Hours</h5>
                        <p>{{ $logotech->{ 'houre_' . $locale } }} </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="location">
                        <h5>Location</h5>
                        <p> {{ $logotech->{ 'location_' . $locale } }}  </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>Book Now</h5>
                        <p>{{ $logotech->phone }}</p>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="share">
                        <h5>Share:</h5>
                        <ul>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#">Twitter</a>,</li>
                          <li><a href="#">Linkedin</a>,</li>
                          <li><a href="#">Behance</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>          
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="{{ route('meetings')}}">@lang('main.back')</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
    </div>
  </section>
  @endsection
