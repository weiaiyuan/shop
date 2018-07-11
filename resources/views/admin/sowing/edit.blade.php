@extends('admin.layout.index')


@section('content')

@if (count($errors) > 0 )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<!--显示错误信息-->


	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>轮播图修改</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="/admin/sowing/update/{{$data->id}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
					  <div class="control-group">
						<label class="control-label" for="focusedInput">轮播图</label>
						<div class="controls">
						  <input class="input-xlarge focused"  type="file" name="pic"><span><img src="/images/{{ $data->pic }}" style="width:50px"></span>
						</div>
					  </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-primary">修改</button>
						<button class="btn btn-info" type="reset">重置</button>
					  </div>
				</fieldset>
			  </form>
		
		</div>
	</div>
@endsection