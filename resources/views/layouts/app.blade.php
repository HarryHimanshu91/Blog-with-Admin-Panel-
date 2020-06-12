<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield("title")</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('user/css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('user/css/bootstrap-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('user/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('user/css/jcarousel.css') }}" rel="stylesheet" />
  <link href="{{ asset('user/css/flexslider.css') }}" rel="stylesheet" />
  <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
  
  <link href="{{ asset('user/css/jquery.bxslider.css') }}" rel="stylesheet" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" />
  <!-- Theme skin -->
  <link href="{{ asset('user/skins/default.css') }}" rel="stylesheet" />
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('user/ico/apple-touch-icon-144-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('user/ico/apple-touch-icon-114-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('user/ico/apple-touch-icon-72-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" href="{{ asset('user/ico/apple-touch-icon-57-precomposed.png') }}" />
  <link rel="shortcut icon" href="{{ asset('user/ico/favicon.png') }}" />
   <style>
     span.tagscss {
    margin: 5px pa;
    margin: 5px;
    padding: 2px 5px 2px 5px;
    border: 1px solid #ccc;
} .span4.thumbsimsges {
    margin-left: 15px;
    margin-bottom: 15px;
}
.bx-wrapper .bx-caption {
    position: absolute;
    left: 80px;
    bottom: 20px;
    background: #000;
    color: #fff;
    width: 30%;
    z-index: 8;
    padding: 20px;
    opacity: 0.8; border-bottom: #F03C02 5px solid;
}
h2.bxslidesss {
    color: #fff; font-weight: bold;
    font-size: 26px;
    line-height: 1em;
}
p.descrt {
    font-family: 'Open Sans', Arial, sans-serif;
    font-size: 14px;
    font-weight: 300;
    line-height: 1.6em;
    color: #fff;
}
.bxslider-wrap { visibility: hidden; }
   </style>
</head>
<body>
<header style="margin-top: 50px;">
      <div class="container ">
        <div class="row">
          <div class="span4">
            <div class="logo">
              <a href="{{ route('home') }}"><img src="{{ asset('user/img/logo.png') }}" alt="" class="logo" /></a>
               <h1>Flat and trendy bootstrap template</h1> 
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="{{ url('/') }}">Home </a></li>
                    <li class="{{ (request()->segment(1) == 'about') ? 'active' : '' }}"><a href="{{ route('about') }}">About </a></li>
                    <li class="{{ (request()->segment(1) == 'blog') ? 'active' : '' }}"><a href="{{ route('blogs') }}">Blog </a></li>
                    <li class="{{ (request()->segment(1) == 'testimonial') ? 'active' : '' }}"><a href="{{ route('testimonial') }}">Testimonials</a></li>
                    <li class="{{ (request()->segment(1) == 'portfolio') ? 'active' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <!-- <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li> -->
                    @if(Auth::guest())
                    <li><a href="{{ route('login') }}"> User Login </a></li>
                    @else
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> Logout </a>
               
                                <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display:none;">
                                    {{ csrf_field() }}
                                  
                                </form>
                    </li>
                    @endif
                    
                  </ul>
                </nav>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </header>
  <div id="wrapper">
  @yield('content')

  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>  
  <footer style="background: #fff;">
      
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p>
                  <span>&copy; Flattern - All right reserved.</span>
                </p>
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                  -->
                  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
              </div>
            </div>
            <div class="span6">
              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{ asset('user/js/jquery.js') }} "></script>
  <script src="{{ asset('user/js/jquery.easing.1.3.js') }} "></script>
  <script src="{{ asset('user/js/bootstrap.js') }} "></script>
  <script src="{{ asset('user/js/jcarousel/jquery.jcarousel.min.js') }} "></script>
  <script src="{{ asset('user/js/jquery.fancybox.pack.js') }} "></script>
  <script src="{{ asset('user/js/jquery.fancybox-media.js') }} "></script>
  <script src="{{ asset('user/js/google-code-prettify/prettify.js') }} "></script>
  <script src="{{ asset('user/js/portfolio/jquery.quicksand.js') }} "></script>
  <script src="{{ asset('user/js/portfolio/setting.js') }} "></script>
  <script src="{{ asset('user/js/jquery.flexslider.js') }} "></script>
  <script src="{{ asset('user/js/jquery.nivo.slider.js') }} "></script>
  <script src="{{ asset('user/js/modernizr.custom.js') }} "></script>
  <script src="{{ asset('user/js/jquery.ba-cond.min.js') }} "></script>
  <script src="{{ asset('user/js/jquery.slitslider.js') }} "></script>
  <script src="{{ asset('user/js/animate.js') }} "></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset('user/js/custom.js') }} "></script>

  <script src="{{ asset('user/js/jquery.bxslider.js') }} "></script>
  <script>
   $(function(){
      $('.bxslider').bxSlider({
        mode: 'fade',
        captions: true,
        auto: true,
        // autoControls: true,
        onSliderLoad: function(){ 
            $(".bxslider-wrap").css("visibility", "visible");
        }
       // slideWidth: 600
      });
    });
  </script> 

</body>
</html>
