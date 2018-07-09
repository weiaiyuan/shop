@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订单列表页</h2>
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
			  	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名: activate to sort column descending" style="width: 166px;">订单编号</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 248px;">订单时间</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 137px;">下单人</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 148px;">状态</th>
			  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 289px;">操作</th></tr>
		  </thead>   
			  
		  <tbody role="alert" aria-live="polite" aria-relevant="all">
		  	@foreach($data as $v)
		  		<tr class="odd">
					<td class="  sorting_1">{{ $v ->id }}</td>
					<td class="center ">{{ $v->created_at }}</td>
					<td class="center ">{{ $v-> uid}}</td>
					<td class="center ">
						<span class="label label-success">{{{ $v ->orderstatus }}}</span>
					</td>
					<td class="center ">
						<a class="btn btn-success" href="/admin/order/detail/{{$v->id}}">订单详情</a>
						<a class="btn btn-info" href="#">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="/admin/oreder/deltel">删除</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="pagination pagination-centered">{!! $data->render()!!}</div>
	</div>
</div>
@endsection