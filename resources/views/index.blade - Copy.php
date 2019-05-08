@extends('layouts.frontLayout.front_design')
@section('content')

  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
              <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
            @endforeach
            </ol>
            
            <div class="carousel-inner">
            @foreach($banners as $key=>$banner)
              <div class="item @if($key==0) active @endif">
                  <img src='images/frontend_images/banners/{{ $banner->image }}' class="girl img-responsive" alt="" />
              </div>
            @endforeach 
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          @include('layouts.frontLayout.front_sidebar')
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Top Savers Today</h2>
            @foreach($productAll as $product)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" />
                      <h2>INR {{ $product->price }}</h2>
                      <p>{{ $product->product_name }}</p>
                      <a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <!-- <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>INR {{ $product->price }}</h2>
                        <p>{{ $product->product_name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                    </div> -->
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            
          </div><!--features_items-->
          

          <h2 class="title text-center">Grocery & Staples Special</h2>
          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">

              <ul class="nav nav-tabs">
                <li class="active"><a href="#Pulse" data-toggle="tab">Pulse</a></li>
                <li><a href="#aata" data-toggle="tab">Atta & Other Flours</a></li>
                <li><a href="#rice" data-toggle="tab">Rice & Other Grains</a></li>
                <li><a href="#oil" data-toggle="tab">Edible Oils</a></li>
                <li><a href="#salt" data-toggle="tab">Salt & Sugar</a></li>
              </ul>
              
            </div>

            <div class="tab-content">


              <div class="tab-pane fade active in" id="Pulse" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/frontend_images/home/gallery1.jpg') }}" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="tab-pane fade" id="aata" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/frontend_images/home/gallery4.jpg') }}" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="rice" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/frontend_images/home/gallery3.jpg') }}" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="oil" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/frontend_images/home/gallery1.jpg') }}" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="salt" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/frontend_images/home/gallery2.jpg') }}" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!--/category-tab-->
          
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Buy One Get One</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
              <?php $count=1; ?>
              @foreach($productBuyoneGetOne->chunk(3) as $chunk)
                <div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>

                 @foreach($chunk as $product)
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="" />
                          <h2>INR {{ $product->price }}</h2>
                          <p>{{ $product->product_name }}</p>
                          <a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
                <?php $count++;?>
                @endforeach


              </div>

               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->


          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Bhaskarg Exclusive</h2>
            
            <div id="recommended-item-carousel1" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
              <?php $count=1; ?>
              @foreach($productExclusicve->chunk(3) as $chunk)
                <div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>

                 @foreach($chunk as $product)
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="" />
                          <h2>INR {{ $product->price }}</h2>
                          <p>{{ $product->product_name }}</p>
                          <a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
                <?php $count++;?>
                @endforeach


              </div>

               <a class="left recommended-item-control" href="#recommended-item-carousel1" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel1" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->
          
        </div>
      </div>
    </div>
  </section>

@endsection