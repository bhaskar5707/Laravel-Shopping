@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>Orders #{{ $orderDetails->id }}</h1>
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

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Order Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Order Date</td>
                  <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Order Status</td>
                  <td class="taskStatus">{{ $orderDetails->orders_status }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Payment Method</td>
                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Grand Total</td>
                  <td class="taskStatus">{{ $orderDetails->grand_total }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Shipping Charge</td>
                  <td class="taskStatus">{{ $orderDetails->shipping_charges }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Coupon Code</td>
                  <td class="taskStatus">{{ $orderDetails->coupon_code }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Coupon Amount</td>
                  <td class="taskStatus">{{ $orderDetails->coupon_amount }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Billing Address</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Customer Name</td>
                  <td class="taskStatus">{{ $userDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Address</td>
                  <td class="taskStatus">{{ $userDetails->address }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>City</td>
                  <td class="taskStatus">{{ $userDetails->city }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>State</td>
                  <td class="taskStatus">{{ $userDetails->state }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Country</td>
                  <td class="taskStatus">{{ $userDetails->country }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Pincode</td>
                  <td class="taskStatus">{{ $userDetails->pincode }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Mobile</td>
                  <td class="taskStatus">{{ $userDetails->mobile }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Customer Name</td>
                  <td class="taskStatus">{{ $orderDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i> Customer Email</td>
                  <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Update Order Status</h5>
          </div>
          <div class="widget-content nopadding">
             <form action="{{ url('admin/update-order-status') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
               <table width="100%">
                  <tr>
                     <td>
                        <select name="order_status" id="order_status" class="controll-label">
                          <option value="New" @if($orderDetails->orders_status == 'New') selected @endif>New</option>
                          <option value="Pending" @if($orderDetails->orders_status == 'Pending') selected @endif>Pending</option>
                          <option value="Cancelled" @if($orderDetails->orders_status == 'Cancelled') selected @endif>Cancelled</option>
                          <option value="In Process" @if($orderDetails->orders_status == 'In Process') selected @endif>In Process</option>
                          <option value="Shipped" @if($orderDetails->orders_status == 'Shipped') selected @endif>Shipped</option>
                          <option value="Delivered" @if($orderDetails->orders_status == 'Delivered') selected @endif>Delivered</option>
                          <option value="Paid" @if($orderDetails->orders_status == 'Paid') selected @endif>Paid</option>
                        </select>
                     </td>
                     <td>
                       <input type="submit" name="" value="Update Status">
                     </td>
                  </tr>
               </table>
             </form>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Shipping Address</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Customer Name</td>
                  <td class="taskStatus">{{ $orderDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Address</td>
                  <td class="taskStatus">{{ $orderDetails->address }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>City</td>
                  <td class="taskStatus">{{ $orderDetails->city }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>State</td>
                  <td class="taskStatus">{{ $orderDetails->state }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Country</td>
                  <td class="taskStatus">{{ $orderDetails->country }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Pincode</td>
                  <td class="taskStatus">{{ $orderDetails->pincode }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"><i class="icon-info-sign"></i>Mobile</td>
                  <td class="taskStatus">{{ $orderDetails->mobile }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>



    </div>
    <hr>

  </div>
  <div class="container-fluid">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Product Color</th>
                    <th>Product Price</th>
                    <th>Product Qty</th>
                </tr>
            </thead>
            <tbody>
              @foreach($orderDetails->orders as $pro)
                <tr>
                    <td>{{ $pro->product_code }}</td>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_size }}</td>
                    <td>{{ $pro->product_color }}</td>
                    <td>{{ $pro->product_price }}</td>
                    <td>{{ $pro->product_qty }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Order Id</th>
                    <th>Ordered Products</th>
                    <th>Payment Method</th>
                    <th>Grand Total</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </tfoot>
    </table>
  </div>
</div>

@endsection