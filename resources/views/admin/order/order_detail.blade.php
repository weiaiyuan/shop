@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订单详情页</h2>
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
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 120px;">商品名称</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 120px;">收货人</th>
			  		<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 200px;">收货地址</th>
			  		<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 150px;">联系电话</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 50px;">数量</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 90px;">总价</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 150px;">操作</th>
				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				<tr class="odd">
					@foreach($shop_goods as $k => $v)
						@if($v->id == $order_detail-> gid )
					<td class="center">{{ $v -> gname }}</td>
						@endif
					@endforeach
					<td class="center">{{ $order_detail ->rec }}</td>
					<td class="center">{{ $order_detail ->addr }}</td>
					<td class="center">{{ $order_detail ->phone }}</td>
					<td class="center">{{ $order_detail ->cnt }}</td>
					<td class="center">{{ $order_detail ->sum }}</td>
					<td>
						<a class="btn btn-warning" href="/admin/order/edit/{{$order_detail->id}}">修改</a>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="pagination pagination-centered"></div>
	</div>
</div>
@endsection