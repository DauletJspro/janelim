<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    @yield('meta-tags')    
    <link rel="shortcut icon" href="/favicon.png?v=4" />
  
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]-->

    <!-- include the site stylesheet -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/bootstrap.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/animate.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/icon-fonts.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/main.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/custom.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/responsive.css') }}">
  
</head>
<body>
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <!-- Page Loader -->
    <div id="pre-loader" class="loader-container">
      <div class="loader">
        <img src="{{ asset('custom2/img/logo/Logo-1.png') }}" alt="loader">
      </div>
    </div>    
    <!-- W1 start here -->
    <div class="w1">
      @if (Route::is('basket.show'))
        @include('new_design.layout.header_v2')
      @else
        @include('new_design.layout.header')
      @endif
      @yield('content')
      @include('new_design.layout._detail_modal')
      @if (Route::is('basket.show'))        
        @include('new_design.layout.footer_v2')
      @else        
        @include('new_design.layout.footer')
      @endif      
    </div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	<!-- include jQuery -->
	<script src="{{ asset('custom2/js/jquery.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ asset('custom2/js/plugins.js') }}"></script>
	<!-- include jQuery -->
  <script src="{{ asset('custom2/js/jquery.main.js') }}"></script>
  <script src="{{ asset('notify/notify.js')}}"></script>
  <script src="{{ asset('notify/notify.min.js') }}"></script>
  @yield('js')

  <script>

    $('.hide-div').delay(5000).fadeOut('slow');

    function addItemToBasket(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        if (user_id) {
            ajax(route, method, item_id, user_id);
        } else {
            window.location.href = '{{route('login.show')}}';
        }
    }

    function addItemToFavorites(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        var session_id = $(tag_object).data('session-id');
        ajax(route, method, item_id, user_id, session_id);
    }

    function addAfterAuthToFavorites(tag_object) {
        var method = $(tag_object).data('method');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        ajax(route, method, null, user_id, null);
    }

    function cancelItemAfterAuth(tag_object) {
        var method = $(tag_object).data('method');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        ajax(route, method, null, user_id, null);
    }


      function ajax(route, method, item_id = null, user_id, session_id = null) {
        var controllerName = route.split('/')[3];
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url: route,
          type: "POST",
          data: {
              _token: CSRF_TOKEN,
              method_name: method,
              item_id: item_id,
              user_id: user_id,
              session_id: session_id
          },
          success: function (data) {
              if (controllerName == 'basket') {
                  if (method == 'delete') {
                      $("#product-section").load(location.href + " #product-section");
                      $("#total-price-div").load(location.href + " #total-price-div");
                  } else if (data.method == 'add') {
                      if (data.success == 1) {
                          $.notify(data.message, "success");
                      } else if (data.success == -1) {
                          $.notify(data.message, "error");
                      } else if (data.success == 0) {
                          $.notify(data.message, "error");
                      }
                      $("#basket-box").load(location.href + " #basket-box");
                  }
              } else if (controllerName == 'favorite') {
                  if (data.success == 1) {
                      $.notify(data.message, "success");
                      $("#favoriteCount").load(location.href + " #favoriteCount");
                      $("#reload-items").load(location.href + " #reload-items");
                      $("#reload-heart").load(location.href + " #reload-heart");
                  } else if (data.success == 2) {
                      $.notify(data.message, "warning");
                      $("#favoriteCount").load(location.href + " #favoriteCount");
                      $("#reload-items").load(location.href + " #reload-items");
                      $("#reload-heart").load(location.href + " #reload-heart");
                  } else if (data.success == 0) {
                      $.notify(data.message, "danger");
                      $("#favoriteCount").load(location.href + " #favoriteCount");
                  }
              }
          }
        });
      }
  </script>
</body>
</html>