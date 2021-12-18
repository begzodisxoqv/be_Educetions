
@extends('layouts.app')

@section('content')

<section style="border-bottom: 20px solid black;"  class="  heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Here are our upcoming meetings</h6>
          <h2>Add   res</h2>
        </div>
      </div>
    </div>
  </section>


  <div id="map" style="position:relative;overflow:hidden; width: 100%; height: 600px"></div>
        <script>

            var placemarks = [
                    @foreach($showroom as $showroom)
                {
                    latitude: {{$showroom->map_lat}},
                    longitude: {{$showroom->map_lng}},
                    hintContent: '{{$showroom->address_ru }}',
                    balloonContent: '{{$showroom->phone }}',
                },
                @endforeach
            ];

            ymaps.ready(init);
            function init(){
                var Map = new ymaps.Map("map", {
                        center: [41.316096, 69.263496],
                    zoom: 10,
                    controls: ['zoomControl', 'geolocationControl', 'routeEditor', 'fullscreenControl']
                });
                placemarks.forEach(function (obj) {
                    var placemark = new ymaps.Placemark([obj.latitude, obj.longitude], {
                            hintContent: obj.hintContent,
                            balloonContent: obj.balloonContent,
                        },
                        {
                            preset: 'islands#redIcon',
                        });
                    Map.geoObjects.add(placemark);
                });

            }
        </script>
   </div>

    <div style="background-color: black; margin-top: 0px;" class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com/page/1" target="_parent" title="website templates">TemplateMo</a></p>
    </div>
@endsection