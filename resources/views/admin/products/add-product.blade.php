@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Products</a> </div>
    <h1>Product</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Products</h5>

          </div>
          <div class="widget-content nopadding">
            @if(Session::has('flash_message_error'))  
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{!! session('flash_message_error') !!}</strong> 
              </div>    
            @endif 
            @if(Session::has('flash_message_success'))  
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{!! session('flash_message_success') !!}</strong> 
              </div>    
            @endif
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product" id="add_product"  novalidate="novalidate">
            	{{ csrf_field() }}
              <div class="control-group">
                  <label class="control-label">Under Level</label>
                  <div class="controls">
                    <select name="category_id" id="category_id" style="width: 220px;">
                      <?php echo $categories_dropdown;?>
                    </select>
                  </div>
              </div>
              <div class="control-group">
                <label class="control-label">Brands</label>
                <div class="controls">
                  <select name="brand" id="brand" style="width: 220px;">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                      <option value="{{ $brand->slug }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label">Product Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <input type="text" name="description" id="description">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Material And Care</label>
                <div class="controls">
                  <input type="text" name="care" id="care">
                </div>
              </div>
              <div class="control-group">
	              <label class="control-label">File upload input</label>
	              <div class="controls">
                  <input type="file" id="image" name="image" >
                </div>
	            </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection