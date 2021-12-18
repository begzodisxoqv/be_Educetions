

 <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>@lang('main.It is easy to dream and to achieve it .....')</p>

          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                      @lang('main.educetions')
                      </a>  
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class=""><a href="{{ route('home') }}" class="{{ Request::url() == route('home') ? 'active' : '' }}">{{ __('main.home') }}</a></li>
                          <li><a href="{{ route('meetings') }}"class="{{ Request::url() == route('meetings') ? 'active' : '' }}">@lang('main.meetings')</a></li>
                          <li class="scroll-to-section"><a href="#apply">@lang('main.apply now')</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">@lang('main.pages')</a>
                              <ul class="sub-menu">
                                  <li><a href="#">@lang('main.upcoming metings')</a></li>
                                  <li><a href="#">@lang('main.meting details')</a></li>
                              </ul>
                          </li>
                          <li class=""><a href="{{ route('address') }}"class="{{ Request::url() == route('address') ? 'active' : '' }}">@lang('main.address') </a></li> 
                          <li class="scroll-to-section"><a href="#contact">@lang('main.contact us')</a></li> 
                          <li class="has-sub">
                            <a>{{ LaravelLocalization::getCurrentLocaleName() }}</a>
                            <ul class="sub-menu">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode)
                                    <li style="hanging-punctuation: 1" >
                                        <a hreflang="{{ $localeCode['link'] }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode['link'], null, [], true) }}">{{ $localeCode['native'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->