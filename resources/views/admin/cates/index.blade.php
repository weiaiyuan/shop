@extends('admin.layout.index')
@section('content')
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
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row-fluid">
		<div class="span6"><div id="DataTables_Table_0_length" class="dataTables_length"></div>
		<div class="span6"><div class="dataTables_filter" id="DataTables_Table_0_filter">
		<label><form>
		搜索: <input type="text" aria-controls="DataTables_Table_0" name="cname">
		<input type="submit" name="" class="btn btn-info">
		</form></label>
		</div></div></div>
		<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
		  <tr>
				<td class="  sorting_1">Id</td>
				<td>分类名称</td>
				<td>父级分类ID</td>
				<td>父级路径</td>
				<td>状态</td>
				<td>操作</td>
			</tr>
			@foreach ($cate as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->cname }}</td>
				<td>{{ $v->pid }}</td>
				<td>{{ $v->path }}</td>
				<td>{{ $v->status == 1 ? '开启' : '关闭'}} </td>
					<td>
				<!-- 	<a class="btn btn-success" href="#">
							<i class="halflings-icon white zoom-in"></i>  
						</a> -->
						<form action="/admin/cate/edit/{{ $v->id }}" method="post" style="display:inline">
							{{ csrf_field() }}
							<input type="submit" name="" value="修改" class="btn btn-warning" >
						</form>
						<form action="/admin/cate/destroy/{{ $v->id }}" method="post" style="display:inline">
							{{ csrf_field() }}
							<input type="submit" name="" value="删除" class="btn btn-danger" >
						</form>
						
					</td>
				</tr>
			@endforeach
		</table>
	
	<div class="pagination pagination-centered"><ul>{!! $cate->render() !!}</ul></div>
</div>
</div>
</div>


@endsection
							