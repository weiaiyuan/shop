@extends('admin.layout.index')


@section('content')

				   <div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>用户列表</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row-fluid"><div class="span6"><div id="DataTables_Table_0_length" class="dataTables_length"><label><select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> 每页显示记录</label></div></div><div class="span6"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>搜素: <input aria-controls="DataTables_Table_0" type="text"></label></div></div></div><table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  
							  <tr role="row">
							  	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 197.2px;" aria-sort="ascending" aria-label="Username: activate to sort column descending">ID</th>
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Date registered: activate to sort column ascending">用户名</th>
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Role: activate to sort column ascending">手机号</th>
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Role: activate to sort column ascending">邮箱</th>
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Actions: activate to sort column ascending">性别</th>
							  	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Actions: activate to sort column ascending">操作</th>
							  </tr>
						
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
					 		 	
   

					  	<tr class="odd">
								<td class="  sorting_1"></td>
								<td class="center "></td>
								<td class="center "></td>
								<td class="center ">
									
								</td>
								<td class="center ">
									
								</td>
								<td class="center ">
									<a class="btn btn-success" href="/admin/user/create">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
								
								
						</tbody>
					</table>
					<div class="row-fluid">
						<div class="span12">
							<div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 32 entries
							</div>
						</div>
						<div class="span12 center">
							<div class="dataTables_paginate paging_bootstrap pagination">
								<ul>
									<li class="prev disabled">
										<a href="#">← Previous</a>
									</li>
									<li class="active">
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li><li><a href="#">4</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>            
					</div>
				</div>

@endsection