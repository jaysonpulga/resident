@extends('layouts.main')
@section('content')
<style>
.imageStyle{
	float: left;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}
</style>

<section class="content-header">
  <h1>
	<i class="fa fa-gears"></i> List of Residents
  </h1>
</section>


<!-- Main content -->
<section class="content">
<!-- Main row -->
<div class="row">
<div class="col-lg-12">
<!-- Main Box-->
<div class="box">


		    <div class="box-header with-border margin">
				<div class='row'>
					<div class="col-lg-6">
						<span class="pull-left">
								<a href="{{asset('camera')}}" type="button" class="btn btn-primary  btn-flat">
									Create Person
								</a>	
						</span>
					</div>
				</div>
			</div>
			
			
			
		
            <!-- /.box-header -->
            <div class="box-body margin">
				<table id="mainDatatables"  class="table  table-hover" cellspacing="0" width="100%">
					<thead>
					<tr>
					  <th>FullName</th>
					  <th>Address</th>
					  <th>Photo</th>
					  <th>Action</th>
					</tr>
					</thead>
					<tbody></tbody>
				</table>
            </div>
            <!-- /.box-body -->




</div>
<!--box-->	
</div>	  
</div>
<!-- /.row (main row) -->
</section>
<!-- /.content -->




<script type="text/javascript">
var table;

$(document).ready(function(){
	loadMainAccount();
});

function loadMainAccount()
{
	table =  $('#mainDatatables').DataTable({ 
	"order":[],
	"processing": true, //Feature control the processing indicator.
	//"serverSide": true,
	// Load data for the table's content from an Ajax source
	/*
	'language': {
            'loadingRecords': '&nbsp;',
           'processing': '<div class="spinner"></div>'
    },
	*/
	"ajax": {
		"url": "{{asset('getinfo')}}",
		"data" : {_token: "{{csrf_token()}}"},
		"type": "post",
	},
	"bDestroy": true,
	"columns"    : [
		{'data': 'fullname'},
		{'data': 'address'},
		{'data': 'picture_path'},
		{'data': 'action'},
	],

});
	
}
</script>

<script type="text/javascript">
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>


@endsection