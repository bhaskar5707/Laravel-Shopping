@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
<div id="content-header">
<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Images</a> <a href="#" class="current">Add Product Images</a> </div>
<h1>Product Images</h1>
</div>
<div class="container-fluid"><hr>
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
        <h5>Add Product Images</h5>

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
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-images/'.$productDetails->id) }}" name="add_image" id="add_image"  novalidate="novalidate">
        	{{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
          <div class="control-group">
           <label class="control-label">Product Name</label>
           <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
          </div>
          
          <div class="control-group">
           <label class="control-label">Product Code</label>
           <label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>
          </div>

           <div class="control-group">
           <label class="control-label">Product Images</label>
           <div class="field_wrapper">
			      <div class="control-group">
	              <label class="control-label">File upload input</label>
	              <div class="controls">
                    <input type="file" id="image" name="image[]" multiple >
                  </div>
	            </div>
			      </div>
           </div>
          
          </div>
          <div class="form-actions">
            <input type="submit" value="Add Images" class="btn btn-success">
          </div>
        </form>
      </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Images</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image Id</th>
                  <th>Product Id</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($productImages as $image)
                <tr class="gradeX">
                  <td>{{ $image->id }}</td>
                  <td>{{ $image->product_id }}</td>
                  <td> <img src="{{ asset('Images/backend_images/products/small/'.$image->image) }}" style="width:70px;" ></td>
                  
                  <td class="center">
                    <div class="fr">
                      <a rel="{{ $image->id }}" rel1="delete-alternate-image" href="javascript:" class="btn btn-danger btn-mini deletPimage">Delete</a>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>




</div>
</div>

@endsection