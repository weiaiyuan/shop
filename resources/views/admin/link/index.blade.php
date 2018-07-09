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
		<h2><i class="halflings-icon white user"></i><span class="break"></span>分类列表</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
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
						<td>连接名称</td>
						<td>url地址</td>
						<td>连接图片</td>
						<td>操作</td>
					</tr>
					@foreach($data as $k=>$v)	
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->lname }}</td>
						<td>{{ $v->url }}</td>
						<td><img src="/Admin/link/img/{{ $v->limg }}" style="width:50px"></td>
						<td>
							<form action="/admin/links/{{ $v->id }}/edit" method="get" style="display:inline">
								<input type="submit" name="" value="修改" class="btn btn-warning" >
							</form>
							<form action="/admin/links/{{ $v->id }}" method="post" style="display:inline">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" name="" value="删除" class="btn btn-danger" >
							</form>
							
						</td>
					</tr>
					@endforeach
				</table>

				<div class="dataTables_paginate paging_bootstrap pagination">
					<ul>{!! $data->render() !!}</ul>

				</div>
			</div>
		</div>
	</div>


@endsection
							