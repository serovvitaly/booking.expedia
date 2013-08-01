<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>{{$title}}</title>
  <link rel="stylesheet" type="text/css" href="/packages/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/skins/base/css/style.css">
  
  <script src="/packages/jquery/jquery-1.10.1.min.js"></script>
  <script src="/packages/jquery-ui/ui/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="/packages/jquery-ui/themes/base/jquery-ui.css">
  
  <script src="/packages/jquery/form/jquery.form.js"></script>
  <script src="/packages/jquery/tmpl/jquery.tmpl.min.js"></script>
  <script src="/packages/jquery/galleria/galleria-1.2.9.min.js"></script>
  <script src="/packages/jquery/easing/jquery.easing.1.3.min.js"></script>
  <script src="/packages/jquery/scrollTo/jquery.scrollTo.min.js"></script>
  <script src="/packages/jquery/sticky/jquery.sticky.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/packages/jquery/Buttons/css/buttons.css">
  <script src="/packages/jquery/Buttons/js/buttons.js"></script>
  
  <script src="/packages/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="/skins/base/js/references.js"></script>
  
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
    function gmapInitialize(element_id, options) {
        
        var opt = $.extend({
            zoom: 10,
            hotelName: null,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }, options);
        
        var LatLng = new google.maps.LatLng(opt.latitude, opt.longitude);
        
        var map = new google.maps.Map(document.getElementById(element_id),{
            zoom: opt.zoom,
            center: LatLng,
            mapTypeId: opt.mapTypeId
        });
        
        new google.maps.Marker({
            position: LatLng,
            map: map,
            title: opt.hotelName
        });
        
        return map;
    }
  </script>
  
</head>
<body>
  @include('base.common.topmenu')
  <div style="height: 50px;"></div>
  <div class="container">
    {{$content}}
    <footer>
    
    </footer>
  </div>
  
</body>
</html>
