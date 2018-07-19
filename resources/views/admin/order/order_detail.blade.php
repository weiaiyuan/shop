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
		<form action="#" method="get">
			<input type="text" aria-controls="DataTables_Table_0" name="gname">&nbsp;
			<input type="submit" value="搜索" class="btn btn-success">
			<a href="/admin/order/index" class="btn btn-info">返回列表</a>
		</form>

		<table class="table table-striped table-bordered bootstrap-datatable " id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr role="row">
					<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 120px;">商品名称</th>
					<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 120px;">图片</th>
					<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 120px;">收货人</th>
			  		<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 200px;">收货地址</th>
			  		<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 150px;">联系电话</th>
					<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Role: activate to sort column ascending" style="width: 50px;">数量</th>
					<th class="sorting" role="columnheader" aria-controls="DataTables_Table_0" aria-label="Status: activate to sort column ascending" style="width: 90px;">总价</th>

				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($orders as $k=>$v)
				<tr>
					<td>{{ $good->gname }}</td>
					<td><img src="/images/goods/{{ $good->gpic }}" style="width:80px"></td>
					<td></td>
					<td></td>
					<td></td>
					<td>{{ $v->rec }}</td>
					<td>{{ $v->sum }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="pagination pagination-centered"></div>
	</div>
</div>
@endsection