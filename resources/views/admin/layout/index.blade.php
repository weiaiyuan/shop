<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>后台管理</title>
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




</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/admin"><span>后台管理</span></a>
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">


						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>管理员
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>账号设置</span>
								</li>
								<li><a href="/"><i class="halflings-icon home"></i>前台</a></li>
								<li><a href="/admin/login"><i class="halflings-icon off"></i>退出</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header --><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet">用户管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/user/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 用户添加</span></a></li>
								<li><a class="submenu" href="/admin/user"><i class="icon-file-alt"></i><span class="hidden-tablet"> 用户列表</span></a></li>

								<li><a class="submenu" href="/admin/user/create"><i class="icon-plus"></i><span class="hidden-tablet"> 用户添加</span></a></li>
								<li><a class="submenu" href="/admin/user"><i class="icon-list"></i><span class="hidden-tablet"> 用户列表</span></a></li>
								<li><a class="submenu" href="/user/show/show"><i class="icon-trash"></i><span class="hidden-tablet"> 回收站</span></a></li>
							</ul>
						</li>


								<!-- 订单管理开始 -->
						<li>
							<a class="dropmenu" href="#"><i class="icon-list"></i><span class="hidden-tablet">订单管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/order/index"><i class="icon-align-left"></i><span class="hidden-tablet">订单列表</span></a></li>
							</ul>
						</li>
								<!-- 订单管理结束 -->

						<li>
							<a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">分类管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/cate/create"><i class="icon-star"></i><span class="hidden-tablet"> 添加分类</span></a></li>
								<li><a class="submenu" href="/admin/cate"><i class="icon-align-justify"></i><span class="hidden-tablet">分类列表</span></a></li>
							</ul>
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">商品管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/good/create"><i class="icon-star"></i><span class="hidden-tablet">添加商品</span></a></li>
								<li><a class="submenu" href="/admin/good"><i class="icon-file-alt"></i>商品列表</a></li>
								<li><a class="submenu" href="/admin/goodlook/create"><i class="icon-trash"></i>回收站</a></li>
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">活动管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/activity/create"><i class="icon-star"></i><span class="hidden-tablet">添加活动</span></a></li>
								<li><a class="submenu" href="/admin/activity"><i class="icon-file-alt"></i>活动列表</a></li>
							</ul>
						</li>
						
						<!--评价链接-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">评价管理</span></a>
							<ul>	
								<li><a class="submenu" href="/admin/comment"><i class="icon-file-alt"></i>评论列表</a></li>
							</ul>
						</li>

					<!--友情链接-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-link"></i><span class="hidden-tablet"> 友情链接</span></a>
							<ul>
								<li><a class="submenu" href="/admin/links/create"><i class="icon-plus"></i><span class="hidden-tablet">链接添加</span></a></li>
								<li><a class="submenu" href="/admin/links"><i class="icon-list"></i><span class="hidden-tablet"> 链接列表</span></a></li>

							</ul>
						</li>

						<!--广告管理-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-dashboard"></i><span class="hidden-tablet"> 广告管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/ad/create"><i class="icon-plus"></i><span class="hidden-tablet">广告添加</span></a></li>

								<li><a class="submenu" href="/admin/ad"><i class="icon-list"></i><span class="hidden-tablet"> 广告列表</span></a></li>

								<li><a class="submenu" href="/admin/ad/$id"><i class="icon-trash"></i><span class="hidden-tablet">广告回收站</span></a></li>
							</ul>
						</li>

						<!--网站配置-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-cog"></i><span class="hidden-tablet"> 网站配置</span></a>
							<ul>
								<li><a class="submenu" href="/admin/shet"><i class="icon-table"></i><span class="hidden-tablet"> 网站配置表</span></a></li>

								<li><a class="submenu" href="/admin/shet/$id"><i class="icon-trash"></i><span class="hidden-tablet">网站配置回收站</span></a></li>

								<li><a class="submenu" href="/admin/weihu"><i class="icon-magnet"></i><span class="hidden-tablet"> 网站维护</span></a></li>
							</ul>
						</li>
						<!--轮播图-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 轮播图管理</span></a>
							<ul>

								<li><a class="submenu" href="/admin/sowing/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 轮播图添加</span></a></li>

								<li><a class="submenu" href="/admin/sowing/index"><i class="icon-file-alt"></i><span class="hidden-tablet"> 轮播图列表</span></a></li>

							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="#"></i>
					<a href="#>管理列表</a>
					<i class="icon-home"></i>
					<a href="index.html">管理列表</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">欢迎Admin</a></li>
			</ul>
			<!--读取错误信息-->
			@if (session('success'))
			<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
				{{ session('success') }}
			</div>
			@endif
			@if (session('error'))
			<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
				{{ session('error') }}
			</div>
			@endif
				@section('content')

				@show
			</div>

			</div>


			</div>
	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="#">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2018 <a href="downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>

		</p>

	</footer>

	<!-- start: JavaScript-->

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

</body>
</html>
