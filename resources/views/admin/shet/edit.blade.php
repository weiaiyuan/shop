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
			<form class="form-horizontal" action="/admin/shet/{{ $data->id }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<fieldset>
					  <div class="control-group">
						<label class="control-label" for="focusedInput">网站标题</label>
						<div class="controls">
						  <input class="input-xlarge focused" type="text" name="title" value="{{ $data->title }}">
						</div>
					  </div>
					
					  <div class="control-group">
						<label class="control-label" for="focusedInput">链接图片</label>
						<div class="controls">
						  <input class="input-xlarge focused"  type="file" name="logo" value="{{ $data->logo }}"><span><img src="/images/{{ $data->logo }}" style="width:50px"></span>
						</div>
					  </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-warning" style="width:250px">确认修改</button>
					
					  </div>
				</fieldset>
			  </form>
		
		</div>
	</div>
@endsection