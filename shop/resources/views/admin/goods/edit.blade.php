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
<!-- 配置文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<div class="box span12">
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
						<form class="form-horizontal" method="post" action="/admin/good/{{ $data->id }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT')}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">商品名称</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" value="{{ $data->gname }}" name="gname">'
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">商品价格</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker hasDatepicker" id="date01" value="{{ $data->price }}" name="price" placeholder="默认￥">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">商品主题</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker hasDatepicker" id="date01" value="{{ $data->title }}" name="title">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">所属分类</label>
								<div class="controls">
								  <select id="selectError3" name="cid">
									<option value="">--请选择--</option>
									@foreach ($cates as $k=>$v)
									<option value="{{ $v->id }}">{{ $v->cname}}</option>
									@endforeach
								  </select>
								</div>
							  </div>
						  <div class="control-group">
							  <label class="control-label" for="date01">图片提交</label>
							  <div class="controls">
								<input type="file" class="input-xlarge datepicker hasDatepicker" id="date01" value="" name="gpic"><span><img src="/images/goods/{{ $data->gpic}}" style="width: 100px;height: 100px;"></span>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" >商品描述</label>
							  <div class="controls">
							 <script id="container" name="desc" type="text/plain" style="width: 500px;height: 300px;">
        						{!! $data->desc !!}
   							</script>
   							  <script type="text/javascript">
        							var ue = UE.getEditor('container');
    						</script>
							</div>
							</div>
        						
   							</script>
   							  <script type="text/javascript">
        							var ue = UE.getEditor('container');
    						</script>
							</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-warning">修改</button>
							  <button type="reset" class="btn btn-info">取消</button>
							</div>
						  </fieldset>
						</form>   


@endsection