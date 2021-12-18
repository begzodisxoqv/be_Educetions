
 @extends('layouts.app')
 @section('content')
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source style="background-clip: url('https://www.youtube.com/embed/F0UP2jQL_AA') ;" src="assets/images/course-video.mp4" type="video/mp4" />

      </video>
      <div class="video-overlay header-text">
      
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
             	 @foreach( $banners as $banner )
							<div class="caption">
								<h6>{{ $banner->{ 'title_1_' . $locale } }}</h6>
								<h2>{{ $banner->{ 'title_2_' . $locale } }}</h2>
								<p>{!! $banner->{ 'text_' . $locale }!!}</p>
							<div class="main-button-red">
						<div class="scroll-to-section"><a href="#contact">@lang('main.jonin us now')</a></div>
					</div>
				</div>
         		 @endforeach
              </div>
            </div>
          </div>
      </div> 
  </section>
  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          @foreach( $abouts as $abt )
            <div class="item">
              <div class="icon">
                <img src="{{ asset('storage/' . $abt->image) }}" alt="">
              </div>
              <div class="down-content">
                <h4> {{ $abt->{'title_'. $locale}  }}</h4>
                <p>{{ $abt->{'text_'. $locale } }}</p>
              </div>
            </div>
            @endforeach            
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>@lang('main.meetingcatgories')</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>@lang('main.meeting catgories')</h4>
            <ul>
            @foreach ($meetingcatgories as $meetingcatgori)  
              <li><a href="#">{{ $meetingcatgori->{'text_'. $locale}  }}</a></li>
            @endforeach
            </ul>
            <div class="main-button-red">
              <a href="{{ route('meetings') }}">@lang('main.all upcoming meetings')</a>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div   class="col-lg-12 d-flex flex-wrap justify-content-between">
              @foreach ($upcomments as $upcomments)
              <div  style="width: 45%" class="meeting-item">
                <div class="thumb">  
                  <div class="price">
                    <span>{{ $upcomments->price }}</span>
                  </div>
                  <a href="{{ route('meetingsDetail', $upcomments) }}"><img src="{{ asset('storage/' . $upcomments->image) }}" alt="New Lecturer Meeting"></a>
                </div> 
                <div class="down-content">
                  <div class="date">
                    <h6>{{ $upcomments->type  }} <span>{{ $upcomments->data }}</span></h6>
                  </div>
                  <a href="meeting-details.html"><h4>{{ $upcomments->{'title_'. $locale } }}</h4></a>
                  <p>{!!  ($upcomments->{'text' . $locale} ) !!}</p>
                </div>                   
              </div>
              @endforeach 
            </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
               @foreach( $courses as $cours )
              <div class="item">
                <h3>{{ $cours->{'title_'. $locale}  }}</h3>
                <p>{{ $cours-> {'title_'. $locale}  }}</p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact"> @lang('main.join us now') </a></div>
              </div>
              </div>
               @endforeach
            </div>        
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
     @foreach($informations as $information )
            <article class="accordion">
                <div class="accordion-head">
                    <span>{{ $information-> {'title_'. $locale}  }}</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>{!! $information->{ 'text_' . $locale }!!}</p>
                    </div>
                </div>
            </article>
        @endforeach
        </div>
        </div>
      </div>
    </div>
  </section>
  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>@lang('main.all upcoming meetings')</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">       
          @foreach ($popularcourses as $popularcours)     
            <div class="item">
              <img style="width: 259,9px; height: 160px " src="{{ asset('storage/' . $popularcours->image) }}" alt="Course One">
              <div class="down-content">
                <h4>{{ $popularcours->{'text_'. $locale}  }}</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <span>{{ $popularcours->price }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach     
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2> @lang('main.a few focts about our university')</h2>
            </div>		
		
            @foreach ($ourunversitet as $ourunversitet)
            <div class="col-lg-6">
              <div   class="row">
                <div   class="col-12">
                  <div class="count-area-content">
                    <div  class="count-digit">{{ $ourunversitet->number }}</div>
                    <div class="count-title">{{ $ourunversitet->{'text_'. $locale}  }}</div>
                  </div>
                </div>
              </div>      
            </div>
            @endforeach	
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="assets/images/play-icon.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="{{ route('contact.send') }}" method="POST"  enctype="multipart/form-data">              
                @csrf
                <div class="col-md-6">
                  <section class="cta-form cta-light">
                    	
                            <h2 href="contact" class="text-center">@lang('main.levave application')</h2>

  								<div class="form-group"> <i class="fa fa-user"></i>
									<input style="border:1px solid rgba(235, 165, 165, 0.681)" type="text" autocomplete="off" name="name"class="form-control input-lg" id="name" placeholder="@lang('main.name')" required>
								</div>
								<div class="form-group"><i class="fas fa-phone-square-alt"></i>
               						 <input autocomplete="off" class="form-control" data-inputmask="'mask': '+\\9\\9\\8 (99) 999-99-99'" type="text" placeholder="@lang('main.phonenumber')" name="phone" required>                               
								</div>
               					<div class="form-group"> 
									<input  style="border:1px solid rgba(235, 165, 165, 0.681)" type="text" autocomplete="off" name="subject"class="form-control input-lg" id="subject" placeholder="@lang('main.your derection')" required>
								</div>
								<div class="col-lg-12">
									<fieldset>
									  	<textarea  style="border:1px solid rgba(235, 165, 165, 0.681)" name="message" type="text" class="form-control" id="message" placeholder="@lang('main.yor message')" required=""></textarea>
									</fieldset>
								  </div>

							
        <form required>
            
            <div id="recaptcha-container" required ></div>

            <button type="subm" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
        </form>
                      	</form>
                 	</section>
              	</div>
              </form>
            </div>
          </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>


    <script>
        var firebaseConfig = {
          apiKey: "AIzaSyBbbN69uaRplw1n9NZZ0mW32HRCUnpUerE",
      authDomain: "reflected-drake-333408.firebaseapp.com",
       projectId: "reflected-drake-333408",
         storageBucket: "reflected-drake-333408.appspot.com",
  messagingSenderId: "898431182058",
  appId: "1:898431182058:web:8e6bc4c84f49f237b12393",
  measurementId: "${config.measurementId}"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>

        <div class="col-lg-3">  
          <div class="right-info">
            <ul>
              @foreach($communications as $communication )
              <li>
                <h6>{{ $communication->{'title_'. $locale } }}</h6>
                <span>{!! $communication->{ 'text_' . $locale }!!}</span>
              </li>
              @endforeach
            </ul>          
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
 
