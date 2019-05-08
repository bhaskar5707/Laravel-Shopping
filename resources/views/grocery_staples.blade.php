
@foreach($gands_specials as $product)
<div class="col-sm-3">
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
