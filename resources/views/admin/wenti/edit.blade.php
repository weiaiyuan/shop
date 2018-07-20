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
              
		<form class="form-horizontal" action="/admin/wenti/update/{{$data->id}}" method="post" >
			 
		{{ csrf_field() }}
		
			<fieldset>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">解答问题</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" name="fankui">
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