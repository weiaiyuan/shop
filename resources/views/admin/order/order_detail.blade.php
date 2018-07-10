@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订单详情页</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
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
					<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名: activate to sort column descending" style="width: 100px;">商品名称</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">商品图片</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 60px;">商品单价</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 50px;">数量</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 50px;">总价</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 80px;">操作</th>
				</tr>
			</thead>   
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				<tr class="odd">
					<td class="center">{{$order_detail->goods_info->gname}}</td>
					<td class="center">
						<img src="/images/goods/{{$order_detail->goods_info->gpic}}" style="width: 100px;height: 60px">
					</td>
					
					<td class="center">{{ $order_detail->oprice }}</td>
					<td class="center">{{ $order_detail->cnt }}</td>
					<td class="center">{{ $order_detail->sum }}</td>
					<td class="center"></td>
				</tr>
			</tbody>
		</table>
		<div class="pagination pagination-centered"></div>
	</div>
</div>
@endsection