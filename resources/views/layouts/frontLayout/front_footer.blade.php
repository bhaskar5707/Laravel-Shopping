<?php
   use App\http\Controllers\Controller;
   $mainCategories  = Controller::mainCategories(); 

   $allBrands  = Controller::allBrands(); 
?>
<footer id="footer"><!--Footer-->
<!-- <div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="companyinfo">
          <h2><span>e</span>-shopper</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="col-sm-3">
          <div class="video-gallery text-center">
            <a href="#">
              <div class="iframe-img">
                <img src="{{ asset('images/frontend_images/home/iframe1.png') }}" alt="" />
              </div>
              <div class="overlay-icon">
                <i class="fa fa-play-circle-o"></i>
              </div>
            </a>
            <p>Circle of Hands</p>
            <h2>24 DEC 2014</h2>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="video-gallery text-center">
            <a href="#">
              <div class="iframe-img">
                <img src="{{ asset('images/frontend_images/home/iframe2.png') }}" alt="" />
              </div>
              <div class="overlay-icon">
                <i class="fa fa-play-circle-o"></i>
              </div>
            </a>
            <p>Circle of Hands</p>
            <h2>24 DEC 2014</h2>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="video-gallery text-center">
            <a href="#">
              <div class="iframe-img">
                <img src="{{ asset('images/frontend_images/home/iframe3.png') }}" alt="" />
              </div>
              <div class="overlay-icon">
                <i class="fa fa-play-circle-o"></i>
              </div>
            </a>
            <p>Circle of Hands</p>
            <h2>24 DEC 2014</h2>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="video-gallery text-center">
            <a href="#">
              <div class="iframe-img">
                <img src="{{ asset('images/frontend_images/home/iframe4.png') }}" alt="" />
              </div>
              <div class="overlay-icon">
                <i class="fa fa-play-circle-o"></i>
              </div>
            </a>
            <p>Circle of Hands</p>
            <h2>24 DEC 2014</h2>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="address">
          <img src="{{ asset('images/frontend_images/home/map.png') }}" alt="" />
          <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="footer-widget">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="single-widget">
          <h2>Address</h2>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">Order online. All your favourite products from the low price online supermarket for grocery home delivery in Delhi, Gurugram, Bengaluru, Mumbai and other cities in India</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="single-widget">
          <h2>Categories</h2>
          <ul class="nav nav-pills nav-stacked">
            @foreach($mainCategories as $cat)
            <li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="single-widget">
          <h2>All Brands</h2>
          <ul class="nav nav-pills nav-stacked">
            <!-- <li><a href="#">Terms of Use</a></li> -->
            <ul class="nav nav-pills nav-stacked">
            @foreach($allBrands as $brand)
            <li><a href="{{ asset('brands/'.$brand->slug) }}">{{ $brand->name }}</a></li>
            @endforeach
          </ul>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="single-widget">
          <h2>About Bhaskarg</h2>
          <form action="#" class="searchform">
            <input type="text" placeholder="Your email address" />
            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
            <p>Get the most recent updates from <br />our site and be updated your self...</p>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <p class="pull-left">Copyright © 2019 Bhaskarg. All rights reserved.</p>
      <p class="pull-right">Designed by <span><a target="_blank" href="#">S.K.Bhaskar</a></span></p>
    </div>
  </div>
</div>

</footer><!--/Footer-->