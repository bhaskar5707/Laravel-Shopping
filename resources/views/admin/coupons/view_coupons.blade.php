@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Coupons</a> </div>
    <h1>Coupons</h1>
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
            <h5>All Coupons</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  <th>Amount Type</th>
                  <th>Expiry Date</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>1</td>
                  <td>{{ $coupon->coupon_code }}</td>
                  <td>
                    {{ $coupon->amount }}
                    @if($coupon->amount_type=="Percentage") % @else INR @endif 
                  </td>
                  <td>{{ $coupon->amount_type }}</td>
                  <td>{{ $coupon->expiry_date }}</td>
                  <td>{{ $coupon->created_at }}</td>
                  <td>@if($coupon->status==1) Active @else Inactive @endif </td>
                  <td class="center">
                    <div class="fr">
                      <a href="{{ url('/admin/edit-coupon/'.$coupon->id ) }}" class="btn btn-primary btn-mini">Edit</a>  
                      <a rel="{{ $coupon->id }}" rel1="delete-coupon" href="javascript:" class="btn btn-danger btn-mini deletRecord">Delete</a>
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