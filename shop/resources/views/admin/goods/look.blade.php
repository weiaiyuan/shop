@extends('admin.layout.index')
@section('content')
<div class="box span9">
					<div class="box-header">
						<h2><i class="halflings-icon white font"></i><span class="break"></span>{{ $data->gname }}</h2>
					</div>
					<div class="box-content">
						  <div class="page-header">
							  <span style="color:green">主题：</span><h1><small>{{ $data->title }}</small></h1>
						  </div>     
						  <div class="row-fluid">            
							  <div class="span4">
								<h3 style="text-align:center">描述内容</h3>
								<p>
								{!! $data->desc !!}
								</p>
								</div>
						 </div>
					</div>
				</div>
@endsection 