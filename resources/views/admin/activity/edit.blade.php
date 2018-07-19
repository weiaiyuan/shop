@extends('admin.layout.index')
@section('content')
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
		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/activity/{{ $id }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
			<fieldset>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">活动名称</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" name="title" value="{{ $activity->title }}">
				</div>
			  </div>
			  <div class="control-group">
				  <label class="control-label" for="date01">过期时间</label>
				  <div class="controls">
					<input type="date" class="input-xlarge datepicker hasDatepicker" id="date01" value="{{ $activity->day}}" name="day" placeholder="请选择时间">
				  </div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="date01">配图&nbsp</label>
				  <div class="controls">
					<input type="file" class="input-xlarge datepicker hasDatepicker" id="date01" value="{{ $activity->price }}" name="price">
					<input type="file" class="input-xlarge datepicker hasDatepicker" id="date01" value="" name="price"><img src="/images/activity/{{ $activity->price }}" style="width:200px;height: 150px;">
				  </div>
			  </div>
			 <div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">内容&nbsp</label>
				  <div class="controls">
					<div class="cleditorMain" style="width: 500px; height: 250px;"><textarea class="cleditor" id="textarea2" rows="3" style="display: none; width: 500px; height: 197px;" name="content" value="{{ $activity->content }}"></textarea><iframe frameborder="0" src="javascript:true;" style="width: 500px; height: 197px;"></iframe></div>
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