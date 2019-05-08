@extends('layouts.frontLayout.front_design')
@section('content')

<section>
  <div class="container">
    <div class="row">
      @if(Session::has('flash_message_error'))  
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('flash_message_error') !!}</strong> 
          </div>    
        @endif
      <div class="col-sm-3">
        @include('layouts.frontLayout.front_sidebar')
      </div>
      
      <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
          <div class="col-sm-5">
            <div class="view-product">
              <img class="mainImage" src="{{ asset('images/backend_images/products/medium/'.$productDetails->image) }}" alt="" />
              
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    @foreach($productAltImages as $altimages)
                    <a href=""><img class="changeImage" style="width: 80px; cursor: pointer;" src="{{ asset('images/backend_images/products/small/'.$altimages->image) }}" alt=""></a>
                    @endforeach
                  </div>
                  
                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>

          </div>
          <div class="col-sm-7">
          <form name="addtocartForm" id="addtocartForm" method="POST" action="{{ url('add-cart') }}">
          {{ csrf_field() }}
          <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
          <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
          <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
          <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
          <input type="hidden" id="price" name="price" value="{{ $productDetails->price }}">
            <div class="product-information"><!--/product-information-->
              <img src="" class="newarrival" alt="" />

              <h2>{{ $productDetails->product_name }}</h2>
              <p>Sku Code: {{ $productDetails->product_code }}</p>

              <p>
                 <select id="selSize" name="size" style="width: 150px;">
                   <option value="">Select</option>
                   @foreach($productDetails->attributes as $size)
                   <option value="{{ $productDetails->id }}-{{ $size->size }}">{{ $size->size }}</option>
                   @endforeach
                 </select>
              </p>

              <img src="images/product-details/rating.png" alt="" />
              <span>
                <span id="getPrice">INR {{ $productDetails->price }}</span>
                <label>Quantity:</label>
                <input type="text" name="quantity" value="1" />
                @if($total_stock>0)
                <button type="submit" class="btn btn-fefault cart" id="cartButton">
                  <i class="fa fa-shopping-cart"></i>
                  Add to cart
                </button>
                @endif
              </span>
              <p><b>Availability:</b> <span id="Availability"> @if($total_stock>0) In Stock @else Out of stock @endif</span></p>
              <p><b>Condition:</b> New</p>
              <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
          </form>
          </div>
        </div><!--/product-details-->
        
        <div class="category-tab shop-details-tab"><!--category-tab-->
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li><a href="#details" data-toggle="tab">Description</a></li>
              <li><a href="#companyprofile" data-toggle="tab">Material And Care
              </a></li>
              <li><a href="#tag" data-toggle="tab">Delivery Options</a></li>
              <!-- <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> -->
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade" id="details" >
              <div class="col-sm-12">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      {{ $productDetails->description }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
              <div class="col-sm-12">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      {{ $productDetails->care }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="tag" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      Cash On Delivery
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
              <div class="col-sm-12">
                
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                  <span>
                    <input type="text" placeholder="Your Name"/>
                    <input type="email" placeholder="Email Address"/>
                  </span>
                  <textarea name="" ></textarea>
                  <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                  <button type="button" class="btn btn-default pull-right">
                    Submit
                  </button>
                </form>
                <div id="comment_list">
                  
                </div>

              </div>
            </div>
            
          </div>
        </div><!--/category-tab-->
        
        <div class="recommended_items"><!--recommended_items-->
          <h2 class="title text-center">recommended items</h2>
          
          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php $count=1; ?>
            @foreach($relatedProducts->chunk(3) as $chunk)
              <div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>> 
                @foreach($chunk as $item)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ asset('images/backend_images/products/small/'.$item->image) }}" alt="" />
                        <h2>INR {{ $item->price }}</h2>
                        <p>{{ $item->product_name }}</p>
                        <a href="{{ url('product/'.$item->id) }}">
                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
        
      </div>
    </div>
  </div>
</section>



<!-- <table class="table table-striped" id="employeeListing">
  <thead>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Skills</th>
      <th>Desgination</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody id="listRecords">                    
  </tbody>
</table> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function listEmployee(){
  $.ajax({
    type  : 'ajax',
    url   : '{{ url('user-comment') }}',
    async : false,
    dataType : 'json',
    type:'get',
    success : function(data){
      var html = '';
      var i;

      for(i=0; i<data.length; i++){
        html += '<tr id="'+data[i].id+'">'+
            '<td>'+'sad'+'</td>'+
            '<td>'+data[i].name+'</td>'+
            '<td>'+data[i].address+'</td>'+                            
            '<td>'+data[i].city+'</td>'+
            '<td>'+data[i].state+'</td>'+
            '</tr>';
      }
      $('#listRecords').html(html); 

    }
  });
  }
$(document).ready(function(){
  listEmployee();
});
</script>

@endsection

