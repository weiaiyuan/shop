 @extends('home.layone.index')
  @section('content') 
     <div class="main-wrap">
			                @if (session('success'))
						  
						     	<script>
					     		layer.alert('{{session('success')}}', {icon: 6});
						     	</script>
						    
						@endif

						@if (session('error'))
						  
						     	<script>
					     		layer.alert('{{session('error')}}', {icon: 2});
						     	</script>
						    
						@endif
			             <!-- 11111111111111111111111 -->
                         

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner"><em class="bg"></em></i>
                                <p class="stage-name"></p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner"><em class="bg"></em></i>
                                <p class="stage-name"></p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" action="/home/geren/pass/{{session('id')}}" method="post" >
					 {{ csrf_field() }}
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input id="user-new-password" placeholder="由数字、字母组合" type="password" name="pass">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input id="user-confirm-password" placeholder="请再次输入上面的密码" type="password" name="repass">
							</div>
						</div>
						<div class="info-btn">
							    <button type="submit" class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>


			            <!--1111111111111111111111111111111111111111111111111111  -->
				

 @endsection 
