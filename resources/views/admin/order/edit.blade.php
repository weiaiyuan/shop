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
		<h2><i class="halflings-icon white edit"></i><span class="break"></span>订单状态修改页</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="/admin/order/update/{{ $order->id }}" method="post">
			{{ csrf_field() }}
			<fieldset>
			  	<div class="control-group">
					<label class="control-label" for="focusedInput">订单状态</label>
					<div class="controls">
						<select name="status">
							<option>{{ $order->status }}</option>
							<option>待发货</option>
							<option>已发货</option>
							<option>待收货</option>
							<option>已收货</option>
							<option>待支付</option>
							<option>已支付</option>
							<option>交易完成</option>
						</select>
					</div>
				</div>
			  <div class="form-actions">
				<button type="submit" class="btn btn-primary">确认修改</button>
				<button class="btn">取消</button>
			  </div>
			</fieldset>
		  </form>
	</div>
</div>
@endsection