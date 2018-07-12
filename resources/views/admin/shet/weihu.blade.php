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
		<h2><i class="halflings-icon white user"></i><span class="break"></span>网站状态</h2>
		<div class="box-icon">
			
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
			<div class="row-fluid">
				<table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" >
				  	<tr>
						<td class="sorting_1">
							<form action="/admin/weihu">
								<h1 class="text-center">确认状态：
								<button class="btn btn-success" value="1">开启</button>
								<button class="btn btn-danger" value="0">关闭</button>
								</h1>
							</form>
						</td>
					</tr>
					
				</table>

				<div class="dataTables_paginate paging_bootstrap pagination">
					
				</div>
			</div>
		</div>
	</div>


@endsection
							