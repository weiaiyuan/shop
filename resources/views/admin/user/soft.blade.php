@extends('admin.layout.index')


@section('content')

 				<div class="box span12">
  <div class="box-header" data-original-title="">
    <h2>
      <i class="halflings-icon white edit"></i>
      <span class="break"></span>用户列表</h2>
    <div class="box-icon">
      <a href="#" class="btn-setting">
        <i class="halflings-icon white wrench"></i>
      </a>
      <a href="#" class="btn-minimize">
        <i class="halflings-icon white chevron-up"></i>
      </a>
      <a href="#" class="btn-close">
        <i class="halflings-icon white remove"></i>
      </a>
    </div>
  </div>
  <div class="box-content">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
      <div class="row-fluid">
        <div class="span6">
          <div id="DataTables_Table_0_length" class="dataTables_length">
            <form action="" method="get">
              <div class="span6">
                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                  <label>搜素:
                    <input aria-controls="DataTables_Table_0" type="text" name="user" placeholder="用户名"></label></div>
              </div>
              <button type="submit" class="btn btn-success">搜索</button></form>
          </div>
        </div>
      </div>
    </div>
    <div class="center">
      <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <tr role="row">
          <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 30.2px;" aria-sort="ascending" aria-label="Username: activate to sort column descending">ID</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">用户名</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">手机号</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">邮箱</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">权限</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">性别</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">头像</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">操作</th></tr>
        	<tbody role="alert" aria-live="polite" aria-relevant="all">
		        @foreach ($del_data as $k=>$v)
		        <tr class="odd">
		            <td class="sorting_1">{{$v->id}}</td>
		            <td class="center ">{{$v->uname}}</td>
		            <td class="center ">{{$v->phone}}</td>
		            <td class="center ">{{$v->email}}</td>@if($v->qx==1)
		            <td class="center ">管理员</td>@elseif($v->qx==2)
		            <td class="center ">普通用户</td>@endif @if($v->sex=='w')
		            <td class="center ">女</td>@elseif($v->sex=='m')
		            <td class="center ">男</td>@elseif($v->sex=='x')
		            <td class="center ">保密</td>@endif
		            <td>
		              <img src="/uploads/{{$v->tou}}" width="50" height="50"></td>
		            <td class="center ">
		              <a href="/user/show/reset/{{$v->id}}" class="btn btn-warning">恢复</a>
		              <a href="/user/show/del/{{$v->id}}" class="btn btn-danger" onclick="return confirm('确认删除吗?')">永久删除</a></td>
		        </tr>
		      	@endforeach
	      	</tbody>
      </table>
    </div>
    <div class="pagination pagination-centered">{!! $del_data->render() !!}</div></div>
</div>
	    
	
	    			
	 					

@endsection
