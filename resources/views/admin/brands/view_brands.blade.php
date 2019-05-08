@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Brands</a> </div>
    <h1>Brands</h1>
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
            <h5>All Brands</h5>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style="float: right;margin: 4px 11px 4px 1px;">Add Brand</button>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Brand Name</th>
                  <th>Brand Url</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody id="listRecords">                    
	           </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Brand</h4>
      </div>
      <div class="modal-body">
      	<div class="alert alert-success" style="display:none"></div>
        <form id="myForm" method="get">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="type">Slug:</label>
              <input type="text" class="form-control" id="slug">
            </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	    <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Edit Brand</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
	    </div>
	    <div class="alert alert-success" style="display:none"></div>
	    <form id="editEmpForm" method="get">
	    <div class="modal-body">
			<div class="form-group">
				<label for="name">Name*</label>
				  <input type="text" name="name" id="ename" class="form-control" placeholder="Name" required>
			</div>
			<div class="form-group">
				<label  for="slug">Slug*</label>
				  <input type="text" name="slug" id="eslug" class="form-control" placeholder="Slug" required>
			</div>	
	    </div>
	    <div class="modal-footer">
			<input type="hidden" name="brandId" id="brandId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="ajaxUpdate">Update</button>
		</div>
		</form>
	</div>
  </div>
</div>

<form id="deleteBrandForm" method="post">
	<div class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">
			   <strong>Are you sure to delete this record?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deleteBrandId" id="deleteBrandId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
		</div>
	  </div>
	</div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function(){
jQuery('#ajaxSubmit').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $('#ajaxSubmit').html('Sending..');
    jQuery.ajax({
      url: "{{ url('/admin/addbrand') }}",
      method: 'get',
      data: {
         name: jQuery('#name').val(),
         slug: jQuery('#slug').val(),
      },
      success: function(result){
      	//alert(result);
      	$('#ajaxSubmit').html('Submit');
      	jQuery('.alert').show();
        jQuery('.alert').html(result.success);
        $('#name').val("");
		$('#slug').val("");
		jQuery('.alert').hide();
		$('#myModal').modal('hide');
		listBrands();
      }});
   });
});


jQuery(document).ready(function(){
jQuery('#ajaxUpdate').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $('#ajaxUpdate').html('Sending..');
    jQuery.ajax({
      url: "{{ url('/admin/updatebrand') }}",
      method: 'get',
      data: {
         name: jQuery('#ename').val(),
         slug: jQuery('#eslug').val(),
         id: jQuery('#brandId').val(),
      },
      success: function(result){
      	//alert(result);
      	$('#ajaxUpdate').html('Submit');
      	jQuery('.alert').show();
        jQuery('.alert').html(result.success);
        $('#name').val("");
		$('#slug').val("");
		jQuery('.alert').hide();
		$('#editBrandModal').modal('hide');
		listBrands();
      }});
   });
});

function listBrands()
{
  $.ajax({
    type  : 'ajax',
    url   : '{{ url('view-all-brands') }}',
    async : false,
    dataType : 'json',
    type:'get',
    success : function(data){
      var html = '';
      var i;

      for(i=0; i<data.length; i++){
        html += '<tr id="'+data[i].id+'" class="gradeX">'+
            '<td>'+i+'</td>'+
			'<td>'+data[i].name+'</td>'+
			'<td>'+data[i].slug+'</td>'+
			'<td style="text-align:right;">'+
				'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-slug="'+data[i].slug+'" >Edit</a>'+' '+
				'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
			'</td>'+
			'</tr>';
      }
      $('#listRecords').html(html); 

    }
  });
}

$('#listRecords').on('click','.editRecord',function(){
	$('#editBrandModal').modal('show');
	$("#brandId").val($(this).data('id'));
	$("#ename").val($(this).data('name'));
	$("#eslug").val($(this).data('slug'));
});


// show delete form
$('#listRecords').on('click','.deleteRecord',function(){
	var brandId = $(this).data('id');            
	$('#deleteBrandModal').modal('show');
	$('#deleteBrandId').val(brandId);
});



jQuery(document).ready(function(){
jQuery('#deleteBrandForm').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var brandId = $('#deleteBrandId').val();//alert(brandId);
    jQuery.ajax({
      url: "{{ url('/admin/delete-brand') }}",
      method: 'get',
      data: {
         id: brandId,
      },
      success: function(result){
      	//alert(result);
      	$("#"+brandId).remove();
		$('#deleteBrandId').val("");
		$('#deleteBrandModal').modal('hide');
      	
		listBrands();
      }});
   });
});


$(document).ready(function(){
  listBrands();
});

</script>

@endsection