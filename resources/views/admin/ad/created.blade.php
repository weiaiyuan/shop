@extends('admin.layout.index')

@section('content')
<!--显示错误信息-->
@if (count($errors) > 0)
    <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
            
               {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white edit"></i><span class="break"></span>广告添加</h2>
		<div class="box-icon">
			
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/ad" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
			<fieldset>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">广告名称</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="gname" value="{{ old('cname')}}">
				</div>
			  </div>
				
				<div class="control-group">
				<label class="control-label" for="focusedInput">广告位置</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="pid" value="{{ old('cname')}}">
				</div>
			  </div>
				
			  <div class="control-group">
				<label class="control-label" for="focusedInput">广告网址</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="gurl" value="{{ old('cname')}}">
				</div>
			  </div>
			  	
		  	  <div class="control-group">
				<label class="control-label" for="focusedInput">广告图片</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="file" value="" name="files" value="{{ old('cname')}}">
				</div>
		  	  </div>

			  <div class="control-group">
				<label class="control-label" for="focusedInput">开始时间</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="date" name="start" value="{{ old('cname')}}">
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="focusedInput">结束时间</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="date" name="end" value="{{ old('cname')}}">
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