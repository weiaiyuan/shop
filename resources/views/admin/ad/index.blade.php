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
		<h2><i class="halflings-icon white user"></i><span class="break"></span>广告列表</h2>
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
								<form>
									
									搜索: <input type="text" aria-controls="DataTables_Table_0" name="name">
									<input type="submit" name="" class="btn btn-success"> 
									<button class="btn btn-info" onclick="back()">返回</button>
								</form>
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
				  	<tr>
						<td class="  sorting_1">ID</td>
						<td>名称</td>
						<td>位置</td>
						<td>url</td>
						<td>图片</td>
						<td>开始时间</td>
						<td>结束时间</td>
						<td>操作</td>
					</tr>
					@foreach($data as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->gname }}</td>
							<td>{{ $v->pid }}</td>
							<td>{{ $v->gurl }}</td>
							<td>{{ $v->files }}
								<img src="/images/ad/{{ $v->files }}" style="width:50px">
							</td>
							<td>{{ $v->start }}</td>
							<td>{{ $v->end }}</td>
							<td>
								<a href="/admin/ad/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
								<form action="/admin/ad/{{ $v->id }}" method="post" style="display:inline">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<input type="submit" value="删除" class="btn btn-danger" >
								</form>
									
							</td>
						</tr>
					@endforeach
					
				</table>

				<div class="dataTables_paginate paging_bootstrap pagination">
					<div class="text-center"><ul>{!! $data->render() !!}</ul></div>
					
				</div>
			</div>
		</div>
	</div>


@endsection
							