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
			</div></div></div>
			<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" align="center">
			  <tbody style="text-align: center;"><tr >
					<td style="text-align: center;">推荐商品</td>
					<td style="text-align: center;">商品图片</td>
					<td style="text-align: center;">推荐位置</td>
					<td style="text-align: center;">操作</td>
				</tr>
			 @foreach ($push as $k=>$v)
			<tr>
				<td style="text-align: center;">
			 	@foreach ($goods as $key=>$val)
				@if($v->uid == $val->id)
				{{ $val->gname }}
				</td>
				<td style="text-align: center;">
				<img src="/images/goods/{{ $val->gpic }}" style="width: 100px;height: 60px">
				@endif
				@endforeach
				</td>
				<td style="text-align: center;">
				{{ $v->direction == 'left' ? '左' : ''}}
				{{ $v->direction == 'right' ? '右' : ''}}
				{{ $v->direction == 'center' ? '中' : ''}}
				{{ $v->direction == 'no' ? '暂无' : ''}}
				</td>
				<td style="text-align: center;">
				<form action="/admin/pushhuifu/huifu/{{$v->id}}" method="get" style="display:inline">
					<input type="submit" name="" value="恢复" class="btn btn-warning">
				</form>
				<form action="/admin/pushhuifu/del/{{ $v->id }}" method="post" style="display:inline">
					{{ csrf_field() }}
					<input type="submit" name="" value="永久删除" class="btn btn-danger">
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			<div class="pagination pagination-centered"><ul>{!! $push->render() !!}</ul></div>
			</div>
		</div>
	</div>
</div>
@endsection