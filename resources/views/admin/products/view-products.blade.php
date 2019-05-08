@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Products</a> </div>
    <h1>Products</h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Products</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Id</th>
                  <th>Category  Id</th>
                  <th>Category  Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                  <td>1</td>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->category_id }}</td>
                  <?php /*?><td>{{ $product->category_name }}</td><?php */?>
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_code }}</td>
                  <td>{{ $product->product_color }}</td>
                  <td>{{ $product->price }}</td>
                  <td>
                    @if(!empty($product->image))
                    <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" style="width: 100px;">
                    @endif
                  </td>
                  <td class="center">
                    <div class="fr">
                      <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> 
                      <a href="{{ url('/admin/edit-product/'.$product->id ) }}" class="btn btn-primary btn-mini">Edit</a> 
                      <a href="{{ url('/admin/add-attributes/'.$product->id ) }}" class="btn btn-primary btn-mini">Add Attribute</a> 
                      <a href="{{ url('/admin/add-images/'.$product->id ) }}" class="btn btn-primary btn-mini">Add Image</a> 
                      <a rel="{{ $product->id }}" rel1="delete-product" <?php /*?>href="{{ url('/admin/delete-product/'.$product->id ) }}"<?php */?> href="javascript:" class="btn btn-danger btn-mini deletRecord">Delete</a>
                    </div>
                  </td>
                </tr>

                <div id="myModal{{ $product->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>{{ $product->product_name }} , Full Details</h3>
                  </div> 
                  <div class="modal-body">
                    <p>Product Name  : {{ $product->product_name }}</p>
                    <p>Category Name : {{ $product->category_name }}</p>
                    <p>Product Code  : {{ $product->product_code }}</p>
                    <p>Product Color : {{ $product->product_color }}</p>
                    <p>Product Price : {{ $product->price }}</p>
                    <p>@if(!empty($product->image))
                      <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" style="width: 70px;">
                      @endif
                    </p>
                  </div>
                </div>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection