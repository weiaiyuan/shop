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
				<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
				  	<tr>
						<td class="  sorting_1">ID</td>
						<td>网站标题</td>
						<td>网站LOGO</td>
						<td>操作</td>
					</tr>
				@foreach($data as $k=>$v)
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->title }}</td>
						<td>{{ $v->logo }}<img src="/images/{{ $v->logo }}" style="width:50px"></td>
						<td>
							<form action="/admin/shet/{{ $v->id }}/edit" method="get" style="display:inline">
								<input type="submit" name="" value="修改" class="btn btn-warning" >
							</form>
							<form action="/admin/shet/{{ $v->id }}" method="post" style="display:inline">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" name="" value="删除" class="btn btn-danger" >
								
							</form>
						</td>
					</tr>
				@endforeach
				</table>

				<div class="dataTables_paginate paging_bootstrap pagination">
					
				</div>
			</div>
		</div>
	</div>


@endsection
							