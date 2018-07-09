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
						<label ><form action="/admin/goodlook/show" method="get" style="display:inline">
						
						搜索: <input type="text" aria-controls="DataTables_Table_0" name="name">
						<input type="submit" name="" value="搜索" class="btn btn-info">
						</form></label>
						</div></div></div>
						<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
						  <tr>
								
								<td>商品id</td>
								<td>商品名称</td>
								<td>商品价格</td>
								<td>商品图片</td>
								<td>销量</td>
								<td>库存</td>
								<td>主题</td>
								<td>操作</td>
							</tr>
						@foreach ($data as $k=>$v) 
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->gname }}</td>
							<td>{{ $v->price }}</td>
							<td><img src="/Admin/goods/{{ $v->gpic }}" style="width: 100px;height: 60px"></td>
							<td>{{ $v->salecnt or 50}}</td>
							<td>{{ $v->stock or 50}}</td>
							<td>{{ $v->title }}</td>
							<td>
						
							<!-- 	<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<form action="/admin/good/{{ $v->id }}/edit" method="get" style="display:inline">
										
										<input type="submit" name="" value="修改" class="btn btn-warning" >
										
									</form>
									<form action="/admin/good/{{$v->id}}" method="post" style="display:inline">
										{{ csrf_field() }}
										{{ method_field('DELETE')}}
										<input type="submit" name="" value="删除" class="btn btn-danger" >
									</form>
									<button class="btn btn-info"><a href="/admin/goodlook/index/{{ $v->id }}" style="text-decoration: none">查看</a></button>
								</td>
							</tr>
						@endforeach
						</table>
					
					<div class="dataTables_paginate paging_bootstrap pagination"><ul>{!! $data->render() !!}</ul></div>
				</div>
				</div>
				</div>
			</div>

@endsection
							