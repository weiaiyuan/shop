@extends('admin.layout.index')

@section('content')
<!--显示错误信息-->


	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>网站配置</h2>
			<div class="box-icon">
				
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="/admin/sh	et" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
					  <div class="control-group">
						<label class="control-label" for="focusedInput">标题名称</label>
						<div class="controls">
						  <input class="input-xlarge focused" type="text" name="title">
						</div>
					  </div>


					  <div class="control-group">
						<label class="control-label" for="focusedInput">网站LOGO</label>
						<div class="controls">
						  <input class="input-xlarge focused"  type="file" name="logo">
						</div>
					  </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-primary">保存提交</button>
						<button class="btn btn-info" type="reset">重置</button>
					  </div>
				</fieldset>
			  </form>
		
		</div>
	</div>
@endsection