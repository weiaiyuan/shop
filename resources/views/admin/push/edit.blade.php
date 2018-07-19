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
		<h2><i class="halflings-icon white edit"></i><span class="break"></span>推荐位</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/push/{{ $push->id }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
			<fieldset>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">要推荐的商品</label>
				<div class="control-group">
					<div class="controls">
					  	<select id="selectError3" name="uid">
					    @foreach ($goods as $k=>$v)
						 <option value="{{ $v->id }}" {{$v->id == $push->uid ? 'selected' : ''}}>{{ $v->gname }}</option>
					    @endforeach
						</select>
					</div>
				  </div>
			  </div>
			<label class="control-label">推荐位选择</label>
			<div class="controls">
				  <label class="radio">
					<div class="radio" id="uniform-optionsRadios1"><input type="radio" name="direction" id="optionsRadios1" value="left" {{$push->direction == 'left' ? 'checked' : ''}}></div>
					&nbsp &nbsp&nbsp         左边位
				  </label>
				  <div style="clear:both"></div>
				  <label class="radio">
					<div class="radio" id="uniform-optionsRadios2"><input type="radio" name="direction" id="optionsRadios2" value="center" {{$push->direction == 'center' ? 'checked' : ''}}></div>
					&nbsp &nbsp&nbsp         中间位
				  </label>
				  <div style="clear:both"></div>
				  <label class="radio">
					<div class="radio" id="uniform-optionsRadios2"><input type="radio" name="direction" id="optionsRadios2" value="right" {{$push->direction == 'right' ? 'checked' : ''}}></div>
					&nbsp &nbsp&nbsp         右边位
				  </label>
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