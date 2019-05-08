<?php
   use App\http\Controllers\Controller;
   $mainCategories  = Controller::mainCategories(); 
?>

<header id="header"><!--header-->
  <div class="header_top"><!--header_top-->
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contactinfo">
            <ul class="nav nav-pills">
              <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!--/header_top-->
  
  <div class="header-middle"><!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="logo pull-left">
            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
          </div>
          <div class="btn-group pull-right">
            <div class="btn-group">

              <div class="search_box pull-right">
                <form action="{{ url('search-products') }}" method="post">
                  {{ csrf_field() }}
                  <input required="" type="text" placeholder="Search products" name="product" />
                  <button type="submit" style="border: 0px;height: 33px;">GO</button>
                </form>
              </div>

            </div>

          </div>
        </div>
        <div class="col-sm-8">
          <div class="shop-menu pull-right">
            <ul class="nav navbar-nav">
              
              <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
              <li><a href="{{ url('/orders') }}"><i class="fa fa-crosshairs"></i> Orders</a></li>
              <li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
              <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
              @if(empty(Auth::check()))
                <li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
              @else
                <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="{{ url('/user-logout') }}"><i class="fa fa-user"></i> Logout</a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!--/header-middle-->

  <div class="header-bottom"><!--header-bottom-->
    <div class="container">


    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
      </div>
      
      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu">
              <li class="col-sm-3">
                <ul>
                  <li class="dropdown-header">Features</li>
                  <li><a href="#">Auto Carousel</a></li>
                  <li><a href="#">Carousel Control</a></li>
                  <li><a href="#">Left & Right Navigation</a></li>
                  <li><a href="#">Four Columns Grid</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Fonts</li>
                                <li><a href="#">Glyphicon</a></li>
                  <li><a href="#">Google Fonts</a></li>
                </ul>
              </li>
              <li class="col-sm-3">
                <ul>
                  <li class="dropdown-header">Features</li>
                  <li><a href="#">Auto Carousel</a></li>
                  <li><a href="#">Carousel Control</a></li>
                  <li><a href="#">Left & Right Navigation</a></li>
                  <li><a href="#">Four Columns Grid</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Fonts</li>
                                <li><a href="#">Glyphicon</a></li>
                  <li><a href="#">Google Fonts</a></li>
                </ul>
              </li>
              <li class="col-sm-3">
                <ul>
                  <li class="dropdown-header">Plus</li>
                  <li><a href="#">Navbar Inverse</a></li>
                  <li><a href="#">Pull Right Elements</a></li>
                  <li><a href="#">Coloured Headers</a></li>                            
                  <li><a href="#">Primary Buttons & Default</a></li>              
                </ul>
              </li>
              <li class="col-sm-3">
                <ul>
                  <li class="dropdown-header">Much more</li>
                  <li><a href="#">Easy to Customize</a></li>
                  <li><a href="#">Calls to action</a></li>
                  <li><a href="#">Custom Fonts</a></li>
                  <li><a href="#">Slide down on Hover</a></li>                         
                </ul>
              </li>
            </ul>       
          </li>
        <li><a href="#">Store locator</a></li>
        </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
            <li><a href="#">My cart (0) items</a></li>
          </ul>
      </div><!-- /.nav-collapse -->
      </nav>


      <!-- <div class="row">
        <div class="col-sm-9">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="mainmenu pull-left">
            <ul class="nav navbar-nav collapse navbar-collapse">
              <li><a href="{{ url('/') }}" class="active">Home</a></li>
              <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    @foreach($mainCategories as $cat)
                    <li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
                    @endforeach
                  </ul>
              </li> 
              <li><a href="{{ url('/') }}">Contact</a></li>
            </ul>
          </div>
        </div>
      </div> -->






    </div>
  </div><!--/header-bottom-->
</header><!--/header-->

<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}
.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  color: #222;
  padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}

.carousel-control {
  width: 30px;
  height: 30px;
  top: -35px;

}
.left.carousel-control {
  right: 30px;
  left: inherit;
}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right {
  font-size: 12px;
  background-color: #fff;
  line-height: 30px;
  text-shadow: none;
  color: #333;
  border: 1px solid #ddd;
}
</style>

<script type="text/javascript">
  $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>