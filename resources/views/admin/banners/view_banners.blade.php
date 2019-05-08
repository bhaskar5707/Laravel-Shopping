@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Banners</a> </div>
    <h1>Banners</h1>
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
            <h5>All Banners</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($banners as $banner)
                <tr class="gradeX">
                  <td>1</td>
                  <td>{{ $banner->title }}</td>
                  <td>{{ $banner->link }}</td>
                  <td>
                    @if(!empty($banner->image))
                    <img src="{{ asset('images/frontend_images/banners/'.$banner->image) }}" style="width: 100px;">
                    @endif
                  </td>
                  <td class="center">
                    <div class="fr"> 
                      <a href="{{ url('/admin/edit-banner/'.$banner->id ) }}" class="btn btn-primary btn-mini">Edit</a> 
                      <a rel="{{ $banner->id }}" rel1="delete-banner" <?php /*?>href="{{ url('/admin/delete-product/'.$product->id ) }}"<?php */?> href="javascript:" class="btn btn-danger btn-mini deletRecord">Delete</a>
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

@endsection