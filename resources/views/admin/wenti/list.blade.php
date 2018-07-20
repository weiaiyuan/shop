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
    <h2><i class="halflings-icon white user"></i><span class="break"></span>反馈列表</h2>
    <div class="box-icon">
      <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
      <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
      <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    </div>
  </div>
  <div class="box-content">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
      <div class="row-fluid">
        <table class="table table-striped table-bordered bootstrap-datatable text-center" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <tr>
            
            <td>用户名</td>
            <td>联系手机</td>
            <td>问题反馈</td>
            <td>解答问题</td>
            <td>操作</td>
          </tr>
        @foreach($data as $k=>$v)
          <tr>
            <td>{{$v->username}}</td>
            <td>{{$v->userphone}}</td>
            <td>{{$v->wenti}}</td>
            <td>{{$v->fankui}}</td>
            <td>
              <a href="/admin/wenti/edit/{{$v->id}}" class="btn btn-warning">解答</a>
              <a href="/admin/sowing/del" class="btn btn-danger">删除</a>
            </td>
          </tr>
      @endforeach
        </table>

        <div class="pagination pagination-centered">
                {!! $data->render() !!}         
        </div>
      </div>
    </div>
  </div>


@endsection
              