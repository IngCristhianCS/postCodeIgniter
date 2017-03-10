<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codeigniter</title>
	<!--font-awesome-->
	<link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">

	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="/plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css">

	<!--Modernizer bootstrap CSS-->
	<link rel="stylesheet" href="/plugins/bootstrap-material-design-master/css/bootstrap.min.css">

	<!-- datatables CSS-->	
	<link rel="stylesheet" href="/plugins/datatables/media/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="/plugins/datatables/extensions/Responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="/plugins/datatables/extensions/Select/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="/plugins/datatables/extensions/Buttons/css/buttons.bootstrap4.min.css">

	<!--alertify CSS-->
	<link rel="stylesheet" href="/plugins/alertify/css/alertify.min.css">

	<script src="/plugins/bootstrap-material-design-master/js/jquery-3.1.1.min.js"></script>
	<script src="/plugins/bootstrap-material-design-master/js/tether.min.js"></script>
	<!-- bootstrap js -->
	<script src="/plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js" ></script>
	<!--Modernizer bootstrap JS-->
	<script src="/plugins/bootstrap-material-design-master/js/mdb.min.js"></script>

	<!-- datatables js-->
	<script src="/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="/plugins/datatables/media/js/dataTables.bootstrap4.min.js"></script>
	<script src="/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="/plugins/datatables/extensions/Responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="/plugins/datatables/extensions/Buttons/js/dataTables.buttons.js"></script>
	<script src="/plugins/datatables/extensions/Buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="/plugins/jszip/dist/jszip.min.js"></script>
	<script src="/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js"></script>
	
	<!--alertify js-->
	<script src="/plugins/alertify/alertify.min.js"></script>

	<!-- mis scripts-->
	<script src="<?= base_url()?>public/js/post.min.js"></script>
	
</head>
<body>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	  <ul class="nav nav-pills navbar-toggler-right">
		  <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
		    <div class="dropdown-menu dropdown-menu-right">
		      <a class="dropdown-item" href="<?= base_url()?>salir">Salir</a>
		    </div>
		  </li>
		</ul>
	  <a class="navbar-brand" href="#">CI</a>

	  <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="text" placeholder="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>-->
	</nav>
	<div class="container">