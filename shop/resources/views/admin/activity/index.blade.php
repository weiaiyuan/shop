@extends('admin.layout.index')
@section('content')
<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white user"></i><span class="break"></span>活动列表</h2>
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
						<label><form style="display:inline">
						搜索: <input type="text" aria-controls="DataTables_Table_0" name="cname">
						<input type="submit" name="" value="搜索" class="btn btn-info">
						</form></label>
						</div></div></div>
						<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <tbody><tr>
								<td>活动标题</td>
								<td>活动图片</td>
								<td>活动内容</td>
								<td>活动开始时间</td>
								<td>活动为期</td>
								<td>操作</td>
							</tr>
						 @foreach ($shop as $k=>$v)
						<tr>
							<td>{{ $v->title }}</td>
							<td><img src="/images/activity/{{ $v->price }}" style="width: 100px;height: 60px"></td>
							<td>{{ $v->content }}</td>
							<td>{{ $v->created_at }}</td>
							<td>24</td>
							<td>
							<form action="/admin/activity/{{ $v->id }}/edit" method="get" style="display:inline">
								<input type="submit" name="" value="修改" class="btn btn-warning">
							</form>
							<form action="/admin/activity/{{ $v->id }}" method="post" style="display:inline">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" name="" value="删除" class="btn btn-danger">
								</form>
							</td>
						</tr>
						@endforeach
						</tbody>
						</table>
						<div class="pagination pagination-centered"><ul>{!! $shop->render() !!}</ul></div>
					</div>
				</div>
				</div>
			</div>
@endsection