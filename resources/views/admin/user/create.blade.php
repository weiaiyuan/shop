@extends('admin.layout.index')


@section('content')

@if (count($errors) > 0 )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
           <div class="box span12">
  <div class="box-header" data-original-title="">
    <h2>
      <i class="halflings-icon white edit"></i>
      <span class="break"></span>用户添加</h2>
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
    <form class="form-horizontal" method="post" action="/admin/user" enctype="multipart/form-data">{{ csrf_field() }}
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="typeahead">用户姓名</label>
          <div class="controls">
            <input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" type="text" name="uname" placeholder="请输入用户名最小8位最大20位"></div>
          <br>
          <label class="control-label" for="typeahead">用户密码</label>
          <div class="controls">
            <input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" type="text" name="pass"></div>
          <br>
          <label class="control-label" for="typeahead">确认密码</label>
          <div class="controls">
            <input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" type="text" name="repass"></div>
          <br>
          <label class="control-label" for="typeahead">用户邮箱</label>
          <div class="controls">
            <input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" type="text" name="email"></div>
          <br>
          <label class="control-label" for="typeahead">手机号</label>
          <div class="controls">
            <input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" type="text" name="phone"></div>
          <br>
          <div class="control-group">
            <label class="control-label">权限</label>
            <div class="controls">
              <label class="radio">
                <input type="radio" name="qx" id="optionsRadios1" value="1" checked="">管理员</label>
              <label class="radio">
                <input type="radio" name="qx" id="optionsRadios2" value="2">普通用户</label></div>
          </div>
          <div class="control-group">
            <label class="control-label">性别</label>
            <div class="controls">
              <label class="radio">
                <input type="radio" name="sex" id="optionsRadios1" value="w" checked="">女</label>
              <label class="radio">
                <input type="radio" name="sex" id="optionsRadios2" value="m">男</label>
              <label class="radio">
                <input type="radio" name="sex" id="optionsRadios2" value="x">保密</label></div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="fileInput">上传头像</label>
          <div class="controls">
            <div class="uploader" id="uniform-fileInput">
              <input class="input-file uniform_on" id="fileInput" type="file" name="tou">
              <span class="filename" style="-moz-user-select: none;">没有选定文件</span>
              <span class="action" style="-moz-user-select: none;">选择头像</span></div>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">添加</button>
          <button type="reset" class="btn">取消</button></div>
      </fieldset>
    </form>
  </div>
</div>
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>用户添加</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="/admin/user"  enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">用户姓名</label>
							  <div class="controls">
								<input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4"  type="text" name="uname" placeholder="请输入用户名最小8位最大20位">
							  </div><br>
							  <label class="control-label" for="typeahead">用户密码</label>
							  <div class="controls">
								<input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4"  type="text" name="pass">
							  </div><br>
							  <label class="control-label" for="typeahead">用户邮箱</label>
							  <div class="controls">
								<input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4"  type="text" name="email">
							  </div><br>
							   <label class="control-label" for="typeahead">手机号</label>
							  <div class="controls">
								<input class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4"  type="text" name="phone">
							  </div><br>
							   <div class="control-group">
								<label class="control-label">权限</label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="qx" id="optionsRadios1" value="1" checked="">
									管理员
								  </label>
								  
								  <label class="radio">
									<input type="radio" name="qx" id="optionsRadios2" value="2">
									普通用户
								  </label>
								
								</div>
							  </div>

                              <div class="control-group">
								<label class="control-label">性别</label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="sex" id="optionsRadios1" value="w" checked="">
									女
								  </label>
								  
								  <label class="radio">
									<input type="radio" name="sex" id="optionsRadios2" value="m">
									男
								  </label>
								  <label class="radio">
									<input type="radio" name="sex" id="optionsRadios2" value="x">
									保密
								  </label>
								</div>
							  </div>
  


							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">上传头像</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file" name="tou"><span class="filename" style="-moz-user-select: none;">没有选定文件</span><span class="action" style="-moz-user-select: none;">选择头像</span></div>
							  </div>
							</div>          
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">添加</button>
							  <button type="reset" class="btn">取消</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div>

@endsection