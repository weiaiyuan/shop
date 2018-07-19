@extends('admin.layout.index')
@section('content')
@if (count($errors) > 0)
<!-- 显示错误信息 -->
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white edit"></i><span class="break"></span>订单修改页</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/order/update/{{$order_edit->id}}" method="post">
			{{ csrf_field() }}
			<fieldset>
			  	<div class="control-group">
					<label class="control-label" for="focusedInput">商品数量</label>
					<div class="controls">
					  	<input class="input-xlarge focused uneditable-input" name="rec" id="focusedInput" type="text" value="{{$order_edit->cnt}}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">总价</label>
					<div class="controls">
					  	<input class="input-xlarge focused uneditable-input" name="sum" id="focusedInput" type="text" value="{{$order_edit->sum}}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">收货人</label>
					<div class="controls">
					  	<input class="input-xlarge focused" name="rec" id="focusedInput" type="text" value="{{$order_edit->rec}}">
					</div>
				</div>	
				<div class="control-group">
					<label class="control-label" name="phone"  value="">联系电话</label>
					<div class="controls">
					  	<input class="input-xlarge focused" name="phone" type="text" value="{{$order_edit->phone}}">
					</div>
				</div>
					<!-- 收货地址开始 -->
				<div class="control-group hidden-phone">
				  	<label class="control-label" for="textarea2">收货地址</label>
				  	<div class="controls">
						<div class="cleditorMain" style="width: 500px; height: 250px;">
							<div class="cleditorToolbar" style="height: 53px;">
								<div class="cleditorGroup">
									<div class="cleditorButton" title="Bold"></div>
									<div class="cleditorGroup"><div class="cleditorDivider"></div></div>
								</div>
									<textarea class="cleditor" id="textarea2" name="addr" rows="3" style="display: none; width: 500px; height: 197px;">
										{{ $order_edit -> addr}}
									</textarea>
							</div>
				  		</div>
					</div>	
				</div>		
					<!-- 收货地址结束 -->
			  <div class="form-actions">
				<button type="submit" class="btn btn-primary">确认修改</button>
				<button class="btn">取消</button>
			  </div>
			</fieldset>
		  </form>
	</div>
</div>
@endsection