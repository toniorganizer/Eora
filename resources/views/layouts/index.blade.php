<!doctype html>
<html lang="en">
  <head>
    <title>e-ORA UNP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index/fonts/icomoon/style.css">

    <link rel="stylesheet" href="index/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="index/css/jquery-ui.css">
    <link rel="stylesheet" href="index/css/owl.carousel.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="index/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="index/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="index/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="index/css/aos.css">

    <link rel="stylesheet" href="index/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    /* body{    
    font-family: 'Roboto Condensed', sans-serif;
    
} */
    /* body{
        background-image:url(video-bg-1.jpg);
         
    } */
.testimonial{
    background: #fff;
    text-align: center;
    padding: 30px 30px 170px;
    margin: 0 15px 100px;
    position: relative;
    margin-top: 10px;
}
.testimonial:before,
.testimonial:after{
    content: "";
    border-top: 40px solid #fff;
    border-right: 125px solid transparent;
    position: absolute;
    bottom: -40px;
    left: 0;
}
.testimonial:after{
    border-right: none;
    border-left: 125px solid transparent;
    left: auto;
    right: 0;
}
.testimonial .icon{
    display: inline-block;
    font-size: 80px;
    color: #bd986b;
    margin-bottom: 20px;
    opacity: 0.6;
}
.testimonial .description{
    font-size: 16px;
    color: #777;
    text-align: justify;
    margin-bottom: 30px;
    opacity: 0.9;
    letter-spacing: -1px;
}
.testimonial .testimonial-content{
    width: 100%;
    position: absolute;
    left: 0;
}
.testimonial .pic{
    display: inline-block;
    border: 6px solid white;
    border-radius: 50%;
    box-shadow: 0 0 2px 2px #daad86;
    overflow: hidden;
    z-index: 1;
    position: relative;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
}
.testimonial .title{
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-transform: capitalize;
    margin: 0 0 5px 0;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    color: black;
}
.owl-theme .owl-controls{
    margin-top: 60px;
}
.owl-theme .owl-controls .owl-page span{
    width: 32px;
    height: 10px;
    background: #fff;
    border: 2px solid #bd986b;
    margin: 5px;
    opacity: 1;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
    background: #ffd9b8;
    border-color: #fff;
}
    .pic img{
        width: 100px !important;
        height: 50px;
    }
    </style>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-4">
            <h1 class="m-0 site-logo"><a href="/">e - ORA</a></h1>
          </div>

          <div class="col-8">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <!-- <li><a href="#about-section" class="nav-link">About</a></li> -->
                <li><a href="#services-section" class="nav-link">Visi</a></li>
                <!-- <li><a href="#projects-section" class="nav-link">Projects</a></li> -->
                <li><a href="#blog-section" class="nav-link">Mahasiswa</a></li>
                <li><a href="menuRegister" class="btn btn-primary">Register</a></li>
              </ul>
            </nav>


            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>

          </div>

        
        </div>
      </div>
      
    </header>

    @yield('container')

    <footer class="site-section footer">
      <div class="container">

        <div class="row">
          <div class="col-12 text-center">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | Universitas Negeri Padang
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>  
          </div>
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="{{ asset('/index/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('/index/js/jquery-ui.js')}}"></script>
  <script src="{{ asset('/index/js/popper.min.js')}}"></script>
  <script src="{{ asset('/index/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/index/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('/index/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('/index/js/aos.js')}}"></script>
  <script src="{{ asset('/index/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ asset('/index/js/jquery.sticky.js')}}"></script>
  <script src="{{ asset('/index/js/isotope.pkgd.min.js')}}"></script>

  
  <script src="{{ asset('/index/js/main.js')}}"></script>

  <script src="{{ asset('/assets/demo/datatables-demo.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/scripts/main.js') }}"></script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
   <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        autoPlay:true
    });
});
     </script>
  </body>
</html>