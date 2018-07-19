@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订单列表页</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form action="" method="get">
			<input type="text" aria-controls="DataTables_Table_0" name="search">&nbsp;
			<input type="submit" value="搜索" class="btn btn-success">
		</form>
		<table class="table table-striped table-bordered bootstrap-datatable " id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
		  <thead>
			  <tr role="row">
			  	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名: activate to sort column descending" style="width:40px;">订单编号</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 160px;">订单时间</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 60px;">下单人</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 60px;">状态</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width:50px;">操作</th></tr>
		  </thead>

		  <tbody role="alert" aria-live="polite" aria-relevant="all">
		  	@foreach($orders as $v)
		  		<tr class="odd">
					<td class="  sorting_1">{{ $v ->id }}</td>
					<td class="center ">{{ $v->created_at }}</td>
					<!-- 用户表中id 等于订单表中的uid时输出用户名 -->
		  		@foreach($shop_users as $kel => $val)
					@if( $v->uid == $val->id)
					<td>{{ $val->uname }}</td>
					@endif
				@endforeach
					<td class="center ">
						<span class="label label-success">{{{ $v ->status }}}</span>
					</td>
					<td class="center ">
						<a class="btn btn-success" href="/admin/order/detail/{{$v->id}}">订单详情</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="pagination pagination-centered">{!! $orders->render()!!}</div>
	</div>
</div>
@endsection