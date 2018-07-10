@extends('admin.layout.index')
@section('content')
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
						<form class="form-horizontal" action="/admin/cate/update/{{$id}}" method="post">
						{{ csrf_field() }}
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">类别名称</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="cname" value="{{ $cate->cname}}">
								</div>
							  </div>
			
							  <div class="control-group">
								<label class="control-label" for="selectError3">所属分类</label>
								<div class="controls">
								  <select id="selectError3" name="pid">
									<option value="">{{ $cate->cname}}</option>
									@foreach ($cates as $k=>$v)
									<option value="{{ $v->id}}">{{ $v->cname}}</option>
									@endforeach
								  </select>
								</div>
							  </div>
					
							  <div class="form-actions">
								<button type="submit" class="btn btn-danger">修改</button>
								<button class="btn btn-info" type="reset">重置</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div>
@endsection