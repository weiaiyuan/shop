@extends('admin.layout.index')
@section('content')
<div class="box span12">
	<div class="box-header" data-original-title="">
		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订单回收站</h2>
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
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 70px;">订单编号</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 150px;">订单时间</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 90px;">下单人</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 120px;">收货人</th>
			  		<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 200px;">收货地址</th>
			  		<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 150px;">联系电话</th>				
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 150px;">操作</th>
				</tr>
			</thead>   
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($deleted_orders as $k=> $v)
				<tr class="odd">
					<td class="center">{{ $v->id }}</td>
					<td class="center">{{ $v->created_at }}</td>
					@foreach($shop_users as $kel=> $val)
						<td class="center">
						@if($val->id == $v->uid)
						{{ $val -> uname }}
						@endif
					</td>
					@endforeaach
					<td class="center">{{ $v->rec }}</td>
					<td class="center">{{ $v-> addr}}</td>
					<td class="center">{{ $v->tel }}</td>
					<td>
						<a class="btn btn-info" href="/admin/order/restore/{{ $v->id }}">恢复</a>
						<a class="btn btn-danger" href="/admin/order/destory/{{$v->id}}">永久删除</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="pagination pagination-centered"></div>
	</div>
</div>
@endsection
