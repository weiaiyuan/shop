@extends('home.layout.center')
@section('content')
<div class="user-comment">
		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
		</div>
		<hr/>

		<div class="comment-main">
			<form action="/home/comment/store/{{ $data->id }}" method="post">
				{{ csrf_field() }}
				<div class="comment-list">
					<div class="item-pic">
						<a href="#" class="J_MakePoint">
							<img src="/images/goods/{{ $data->gpic }}" class="itempic">
						</a>
					</div>

					<div class="item-title">

						<div class="item-name">
							<a href="#">
								<p class="item-basic-info">{{ $data->gname }}</p>
							</a>
						</div>
						<div class="item-info">
							<div class="info-little">
								<span>颜色：洛阳牡丹</span>
								<span>包装：裸装</span>
							</div>
							<div class="item-price">
								价格：<strong>{{ $data->price }}元</strong>
							</div>										
						</div>
					</div>
					<div class="clear"></div>
					<div class="item-comment">
						<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" name="content"></textarea>
					</div>
					<div class="filePic">
						<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" name="cimg">
						<span>晒照片(0/5)</span>
						<img src="/static/home/images/image.jpg" alt="">
					</div>
					<div class="item-opinion">
						<li><i class="op1" name="hao"></i>好评</li>
						<li><i class="op2" name="zhong"></i>中评</li>
						<li><i class="op3" name="cha"></i>差评</li>
					</div>
				</div>
				
				<!--多个商品评论-->
				
				<div class="info-btn">
					<button class="am-btn am-btn-danger">发表评论</button>
				</div>							
			</form>							
	<script type="text/javascript">
		$(document).ready(function() {
			$(".comment-list .item-opinion li").click(function() {	
				$(this).prevAll().children('i').removeClass("active");
				$(this).nextAll().children('i').removeClass("active");
				$(this).children('i').addClass("active");
				
			});
     })
	</script>					
	
								
			
		</div>

	</div>
@endsection