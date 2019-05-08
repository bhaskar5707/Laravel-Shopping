@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Categories</a> </div>
    <h1>Categories</h1>
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
            <h5>All Categories</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  <th>Category Level</th>
                  <th>Category Url</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr class="gradeX">
                  <td>1</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->parent_id }}</td>
                  <td>{{ $category->url }}</td>
                  <td class="center">
                    <div class="fr">
                      <a href="{{ url('/admin/edit-category/'.$category->id ) }}" class="btn btn-primary btn-mini">Edit</a> 
                      <?php /*?><a id="delCat" href="{{ url('/admin/delete-category/'.$category->id ) }}" class="btn btn-danger btn-mini">Delete</a><?php */?> 
                      <a rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini deletCategoryRecord">Delete</a>
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