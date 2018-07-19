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
							<td><img src="/images/goods/{{ $v->gpic }}" style="width: 100px;height: 60px"></td>
							<td>{{ $v->salecnt or 50}}</td>
							<td>{{ $v->stock or 50}}</td>
							<td>{{ $v->title }}</td>
							<td>
						
							<!-- 	<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<button class="btn btn-success"><a href="/admin/goodlook/edit/{{ $v->id }}" style="text-decoration: none">恢复</a></button>
									<button class="btn btn-danger"><a href="/admin/goodlook/update/{{ $v->id }}" style="text-decoration: none">永久删除</a></button>
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
							