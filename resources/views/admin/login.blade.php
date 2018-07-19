<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>后台登录</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="/static/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/static/admin/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/static/admin/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/static/admin/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="/static/admin/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/static/admin/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(/static/admin/img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

 <body>
 	

		<div class="container-fluid-full">
			   @if(session('error'))
        <div class="alert alert-danger">
            提示信息
            <ul>
                <li>{{ session('error') }}</li>
            </ul>
        </div>
    @endif
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2 class="text-center">登录到您的帐户</h2>
					<form class="form-horizontal" action="/admin/login/login" method="post">
						 {{csrf_field()}}
						<fieldset>
							
							<div class="input-prepend" title="Uname">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="uname" id="username" type="text" placeholder="管理员"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Pass">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="pass" id="password" type="password" placeholder="密码"/>
							</div>
							<div class="clearfix"></div>
							
						

							<div class="button-login">	
								<button type="submit" class="btn btn-primary" style="width:400px;">登录</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
				

					
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="#">Admin templates</a></li>
					<li><a href="http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
	<!-- start: JavaScript-->
</body>
		<script src="/static/admin/js/jquery-1.9.1.min.js"></script>
	<script src="/static/admin/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="/static/admin/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="/static/admin/js/jquery.ui.touch-punch.js"></script>
	
		<script src="/static/admin/js/modernizr.js"></script>
	
		<script src="/static/admin/js/bootstrap.min.js"></script>
	
		<script src="/static/admin/js/jquery.cookie.js"></script>
	
		<script src='/static/admin/js/fullcalendar.min.js'></script>
	
		<script src='/static/admin/js/jquery.dataTables.min.js'></script>

		<script src="/static/admin/js/excanvas.js"></script>
	<script src="/static/admin/js/jquery.flot.js"></script>
	<script src="/static/admin/js/jquery.flot.pie.js"></script>
	<script src="/static/admin/js/jquery.flot.stack.js"></script>
	<script src="/static/admin/js/jquery.flot.resize.min.js"></script>
	
		<script src="/static/admin/js/jquery.chosen.min.js"></script>
	
		<script src="/static/admin/js/jquery.uniform.min.js"></script>
		
		<script src="/static/admin/js/jquery.cleditor.min.js"></script>
	
		<script src="/static/admin/js/jquery.noty.js"></script>
	
		<script src="/static/admin/js/jquery.elfinder.min.js"></script>
	
		<script src="/static/admin/js/jquery.raty.min.js"></script>
	
		<script src="/static/admin/js/jquery.iphone.toggle.js"></script>
	
		<script src="/static/admin/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="/static/admin/js/jquery.gritter.min.js"></script>
	
		<script src="/static/admin/js/jquery.imagesloaded.js"></script>
	
		<script src="/static/admin/js/jquery.masonry.min.js"></script>
	
		<script src="/static/admin/js/jquery.knob.modified.js"></script>
	
		<script src="/static/admin/js/jquery.sparkline.min.js"></script>
	
		<script src="/static/admin/js/counter.js"></script>
	
		<script src="/static/admin/js/retina.js"></script>

		<script src="/static/admin/js/custom.js"></script>
	<!-- end: JavaScript-->
	

</html>
