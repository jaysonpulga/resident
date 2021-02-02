@extends('layouts.main')
@section('content')


<style>
.row_div {
    display: flex;
    flex-wrap: wrap;
    margin-right: -8px;
    margin-left: -8px;
}


.ml-auto, .mx-auto {
    margin-left: auto!important;
}

.mr-auto, .mx-auto {
    margin-right: auto!important;
}


.container_photo {
    position: relative;
    background-color: #fff;
    padding: 1.4rem;
    cursor: pointer;
    border: 1px solid #f3f3f3;
    border-radius: .3125rem;
    box-shadow: 0 1px 5px 0 rgb(0 0 0 / 10%);
}

.user-image {

    width: 300px;
    height:240px;

}
</style>

<section class="content-header">
  <h1>
	<i class="fa fa-gears"></i> 
  </h1>
</section>



<!-- Main content -->
<section class="content">
	<!-- Main row -->
	<div class="row">
		<div class="col-lg-12">

			
		
				<div class="col-md-6">
					<div class="box box-primary">
						<br>	
						<div class="row row_div">
							<div class=" mx-auto">
								<div class="container_photo">
									<div class="row-flex mb-2">
										<div id="my_camera"></div>
											<img src="{{asset('image/avatar/camera_placeholder.png')}}"  id="camera_placeholder" class="user-image" alt="User Image">
									</div>
								</div>
							</div>
						</div>
						<!-- button start -->
						<div  style="display:block;margin-top:25px">
							<center>
								<span id="button1"><input type=button value="Enable Camera" onClick="enable()" id="Enable"></span>
								<span id="button2"></span>
							</center>
						</div>
						<br>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="box box-primary">
						<br>	
						<div class="row row_div">
							<div class=" mx-auto">
								<div class="container_photo">
									<div class="result">
										
											@if(@$userData->picture_path != "")
												<img src="{{ @$userData->picture_path }}" id="imageprev" class="user-image" alt="User Image">				
        									@else
												<img src="{{asset('image/avatar/download.png')}}" id="imageprev" class="user-image" alt="User Image">
        									@endif
									
									
										
									</div>
								</div>
							</div>
						</div>
						<!-- form start -->
						<form  enctype="multipart/form-data" method="post" id="formSubmit">
						@csrf
						 <input id="userPhoto" type="hidden" name="userPhoto" />
						 <input id="userId" type="hidden" name="userId" value="{{ @$userData->id}}" />
						 
						  <div class="box-body">
							<div class="form-group">
							  <label for="Fullname">FullName</label>
							  <input type="text" class="form-control" id="Fullname" name="Fullname" placeholder="FullName" value="{{ @$userData->fullname }}" />
							</div>
							<div class="form-group">
							  <label for="Address">Address</label>
							  <input type="text" class="form-control" id="Address" name="Address" placeholder="Address" value="{{ @$userData->address }}" />
							</div>
						  </div>
						  <!-- /.box-body -->
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						  </div>
						</form>
					</div>
				</div>					
						
			
		</div>	  
	</div>
<!-- /.row (main row) -->
</section>
<!-- /.content -->



	<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
	Webcam.set({
		width: 300,
		height: 240,
		image_format: 'jpeg',
		jpeg_quality: 100
	});

	// Configure a few settings and attach camera
	function enable(){
		$("#camera_placeholder").css('display','none');
		$("#my_camera").css('display','block');
		
		var button_camera = `<input type=button value="Turnoff Camera" onClick="disabledcamera()" id="Disabled">
							<input type=button value="Take Snapshot" onClick="take_snapshot()" id="Shot">`;

		
		Webcam.attach( '#my_camera' );
		
		$("#button2").empty().html(button_camera);
		$("#button1").empty().html('');
	}
	
	function disabledcamera(){
		$("#camera_placeholder").css('display','block');
		$("#my_camera").css('display','none');
		
		var button_camera = `<input type=button value="Enable Camera" onClick="enable()" id="Enable">`;		
		Webcam.reset( '#my_camera' );
		
		$("#button2").empty().html('');
		$("#button1").empty().html(button_camera);
	}

</script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
	// preload shutter audio clip
	var shutter = new Audio();
	shutter.autoplay = false;
	shutter.src = navigator.userAgent.match(/Firefox/) ?  "{{ asset('webcamjs/shutter.ogg') }}"  : "{{ asset('webcamjs/shutter.mp3') }}";
	
	function take_snapshot() {
		
		// play sound effect
		shutter.play();
			
		// take snapshot and get image data
		Webcam.snap( function(data_uri) {
			var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, ''); 
			$('#imageprev').attr('src',data_uri);
			$("#userPhoto").val(raw_image_data);
		});
		
		
		
		
	}
</script>


<script>

// submit html
$("#formSubmit").on("submit", Htmlsubmit); 
function Htmlsubmit(event){
event.preventDefault();

let form = $(this);
let formData = form.serialize();

	$.ajax({
		url: "{{ asset('submit/store') }}",
		data : formData,
		type : 'POST',
		dataType : 'json',
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			alert("save information");
			$('#formSubmit')[0].reset();
			$('#imageprev').attr('src',"{{asset('image/avatar/download.png')}}");
			
		},
		error:function(){
			

		}
				
	});
}

</script>



@endsection