<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <META HTTP-EQUIV="Expires" CONTENT="-1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <input type="hidden" name="token" id="token" value="{{ csrf_token() }}"> 
  <title>Project| Dashboard</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css')}}" >
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]--> 

	<!-- jQuery 2.2.3 -->
	<!--<script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>-->
	<!-- jQuery UI 1.11.4 -->
	<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>--->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

	<!-- load jQuery and jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>


	<!-- DataTables -->
	<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
	<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}" ></script>


	<!-- Waitme -->
	<link rel="stylesheet" href="{{ asset('waitme/waitMe.css')}}">
	<script src="{{ asset('waitme/waitMe.min.js')}}" ></script>


	<!-- sweet alert  !-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	
	
	<!--camaerajs -->
	<script src="{{ asset('webcamjs/webcam.min.js') }}"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">
		@include('layouts.header')
	</header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
	@yield('content')
  <!-- /.content-wrapper -->
  </div><!-- /.content-wrapper -->
   

  <footer class="main-footer">
    @include('layouts.footer')
  </footer>

  
</div>
<!-- ./wrapper -->
</body>
</html>