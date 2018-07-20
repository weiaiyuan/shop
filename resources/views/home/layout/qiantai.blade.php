@extends('home.layout.index')
@section('content')
<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								@foreach($data as $key=>$value)
								<li class="banner2"><a><img src="/images/{{$value->pic}}" ></a></li>
								@endforeach
							</ul>
						</div>
						<div class="clear"></div>
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
<!--蒋旺生做的前台分类-->
			<div id="nav" class="navfull">
				<div class="area clearfix">
				<div class="category-content" id="guide_2">
				<div class="category">
						<ul class="category-list" id="js_climit_li">
							@foreach($cates as $k=>$v)
							<li class="appliance js_toggle relative first">
							<div class="category-info">
							<h3 class="category-name b-category-name"><i><img src="/static/home/images/cake.png"></i><a class="ml-22" title="点心">
							{{ $v->cname }}
							</a></h3>
							<em>&gt;</em></div>
							<div class="menu-item menu-in top">
							<div class="area-in">
							<div class="area-bg">
							<div class="menu-srot">
							@foreach($v['sub'] as $ka=>$va)
							<div class="sort-side">
							<dl class="dl-sort">
							<dt>
							<span title="蛋糕">
								{{$va->cname}} -
							</span>
							</dt>
							<dd>
							@foreach ($va['sub'] as $kaa=>$vaa)
							<a title="{{ $vaa->cname}}" href="/home/detail/59"><span>
								{{ $vaa->cname }} |
							</span></a>
							@endforeach
							</dd>
							</dl>
							</div>
							@endforeach
							</div>
							</div>
							</div>
							</div>
							<b class="arrow"></b>	
							</li>
							@endforeach
						</ul>
				</div>					
				</div>
				</div>
			</div>					
<!--蒋旺生的前台分类结束-->
				<!--轮播-->
						
						<script type="text/javascript">
							$(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>

<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/static/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/static/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/static/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/static/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/static/home/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/static/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="/static/home/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/login/index">登录</a>
								<a class="am-btn-warning btn" href="/home/zhuce/index">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/static/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
					$('.am-u-sm-4 am-u-lg-3 img').eq(1).attr('src','/images/goods/{{ $va->gpic }}')
					$('.recommendation').mouseover(function(){
						alert(1)
					})
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->
<!-- 蒋旺生做的今日推荐 -->
				<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" "="">
							<img src="/images/goods/xm.jpg ">
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							@foreach ($good as $k=>$v)
							@if($v->userinfo->direction =='left')
							<div class="info ">
								<h3>{{ $v->gname }}</h3>
								<h4>{{ $v->title }}</h4>
							</div>
							<div class="recommendationMain one">
							<a href="/home/detail/{{$v->id}}">
							<img src="
							/images/goods/
							{{ $v->gpic }}
							" style="width:150px;height: 150px"></a>
							</div>
							@endif
							@endforeach 
						</div>					
						<div class="am-u-sm-4 am-u-lg-3 ">
							@foreach ($good as $k=>$v)
							@if($v->userinfo->direction =='center')
							<div class="info ">
								<h3>{{ $v->gname }}</h3>
								<h4>{{ $v->title }}</h4>
							</div>
							<div class="recommendationMain three">
								<a href="/home/detail/{{ $v->id }}">
								<img src="/images/goods/
								{{ $v->gpic }}
								" style="width:150px;height: 150px"></a>
							</div>
							@endif
							@endforeach 
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							@foreach ($good as $k=>$v)
							@if($v->userinfo->direction =='right')
							<div class="info ">
								<h3>{{ $v->gname }}</h3>
								<h4>{{ $v->title }}</h4>
							</div>
							<div class="recommendationMain three">
								<a href="/home/detail/{{ $v->id }}">
								<img src="/images/goods/
								{{ $v->gpic }}
								" style="width:150px;height: 150px"></a>
							</div>
							@endif
							@endforeach 
						</div>
					
				</div>
<!-- 蒋旺生做的今日推荐结束 -->
					<div class="clear"></div>
					<!--热门活动 -->
<!-- 蒋旺生做的前台活动 -->
					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4></h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					 <div class="am-g am-g-fixed ">
		@foreach ($activity as $ks=>$vs)
						<div class="am-u-sm-3">
							<div class="icon-sale outer-con " ></div>	
								<h4 style="color:cyan;size:7px">{{ $vs->title }}</h4>							
							<div class="activityMain" title="{{ $vs->title }}">
								<img src="/images/activity/{{ $vs->price}}" style="width:281;height: 300;"></img>
							</div>
							<div class="info ">
								<a><h3 style="color:orange">{{ $vs->content}}</h3></a>
							</div>														
						</div>
		@endforeach
					 </div>
                   </div>
				 <div class="clear ">
				</div>
<!-- 蒋旺生做的前台活动结束 -->

                    <div id="f1">
					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>众多商品</h4>
							<h3>每一个商品都有一个故事</h3>
							<div class="today-brands ">
							@foreach ($goods as $kk=>$vv)
								<a href="# ">{{ $vv->gname }}</a>
							@endforeach
							</div>
							<span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
<!-- 蒋旺生做的商品详情 -->
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">	
						@foreach($goods as $k=>$v)
								<a class="outer" href="#"><span class="inner"><b class="text">{{ $v->gname }}</b></span></a>
						@endforeach
							</div>
							<a href="/home/detail">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/static/home/images/act1.png " style="width:150px;height: 150px">							</a>
							<div class="triangle-topright"></div>						
						</div>
						@foreach($goods as $k=>$v)
						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title ">
									{{ $v->title }}
								</div>
								<div class="sub-title ">
									{{ $v->price }} ￥
								</div>
								<a href="#" title="添加收藏" class="soucang"><input type="hidden" class="hid" name="" value="{{ $v->id }}"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
							</div>
							<a href="/home/detail/{{ $v->id }}"><img src="/images/goods/{{ $v->gpic }}" style="width:150px;height: 150px" /></a>
						</div>
						@endforeach
						</div>
<!-- 蒋旺生做的商品详情结束 -->
                 <div class="clear "></div>  
                 </div>
                 <script type="text/javascript">
                 $('.soucang').click(function(){
                 	if(confirm('确认收藏吗?')){
						s = $(this).find('.hid').val();
						// alert(s)
						$.ajax({
							'url':'/home/collect/create/',
							'data':{'id':s},
							'datatype':'html',
							'type':'get',
							'async':false,
							success:function(msg){
								if(msg == 'success'){
									alert('(#^.^#)添加成功');
								} else {
									alert('┭┮﹏┭┮添加失败!可能是已收藏');

								}
							}
						})
                 	}
                 })
                 </script>
@endsection