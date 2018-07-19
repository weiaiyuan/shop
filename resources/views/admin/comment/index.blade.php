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
		<h2><i class="halflings-icon white user"></i><span class="break"></span>评论管理</h2>
		<div class="box-icon">
			
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row-fluid">
				<div class="span6">
					<div id="DataTables_Table_0_length" class="dataTables_length">
					</div>
					<div class="span6">
						<div class="dataTables_filter" id="DataTables_Table_0_filter">
							<label>
								<form action="/admin/cate/show" method="post">
									{{ csrf_field() }}
									搜索: <input type="text" aria-controls="DataTables_Table_0" name="cname">
									<input type="submit" name="" class="btn btn-info">
								</form>
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
				  	<tr>
						<td class="  sorting_1">ID</td>
						<td>用户ID</td>
						<td>商品ID</td>
						<td>订单ID</td>
						<td>时间</td>
<<<<<<< HEAD
						<td>好评</td>
						<td>操作</td>
					</tr>
					@foreach($res as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->uid }}</td>
							<td>{{ $v->gid }}</td>
							<td>{{ $v->oid }}</td>
							<td>{{ $v->created_at }}</td>
							
								@if($v->hp==1)
								<td>好评</td>
								@endif
								@if($v->hp==2)
								<td>中评</td>
								@endif
								@if($v->hp==3)
								<td>差评</td>
								@endif
							
							<td>
								<a href="/admin/comment/{{ $v->id }}" class="btn btn-success">查看</a>
								<form action="/admin/comment/{{ $v->id }}" method="post" style="display: inline;">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger">删除</button>
								</form>
							</td>
						</tr>
					@endforeach
=======
						<td>操作</td>
					</tr>
>>>>>>> origin/zcz
				</table>

				<div class="dataTables_paginate paging_bootstrap pagination">
					

				</div>
			</div>
		</div>
	</div>


@endsection
							