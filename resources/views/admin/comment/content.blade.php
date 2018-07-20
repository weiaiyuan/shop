@extends('admin.layout.index')

@section('content')
<div class="box span9">
	<div class="box-header">
		<h2><i class="halflings-icon white font"></i><span class="break"></span></h2>
	</div>
	<div class="box-content">
		  <div class="page-header">
			  <span style="color:green">商品：</span><h1><small>{{ $good->gname }}</small></h1>
		  </div>     
		  <div class="row-fluid">            
			  <div class="span4">
				<h2>评论内容:</h2>
				<p style="text-align: center;font-size:30px;width:800px">{{ $com->content }}</p>
				</div>
		 </div>
	</div>
</div>
@endsection