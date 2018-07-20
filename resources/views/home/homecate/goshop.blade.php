
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/static/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/static/home/js/jquery.js"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="menu-hd">
					@if(session('username')==null)
					<a href="/home/login/index" target="_top" class="h">请登录</a>
					
					<a href="/home/zhuce/index" target="_top">免费注册</a>
					@elseif(session('username')!=null)
					欢迎您：<a href="/home/geren/dall" target="_top" class="h">{{session('username')}}</a> 登录&nbsp &nbsp
					<a href="/home/login/outlogin">退出</a>
					@endif
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/home" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/home/geren/dall" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">{{ $num }}</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="/home/collect/index" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/static/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/static/home/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>
<!-- 蒋旺生做的商品购物车页面 -->
						@foreach ($goshop as $k=>$v)
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check dx" id="J_CheckBox_170037950254" name="items[]" value="170037950254" type="checkbox">
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="/images/goods/{{ $v->gpic }}" class="itempic J_ItemImg" style="width:100px;height: 100px"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{$v->title}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->gname}}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">颜色：{{ $v->color }}</span>
											<span class="sku-line">包装：{{ $v->goshop->pack or '暂无'}}</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">78.00</em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now dj" tabindex="0">{{ $v->price }} ￥</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="text_box" name="" type="text" value="{{ $v->goshop->num }}" style="width:30px;" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner zj">
											<em tabindex="0" class="J_ItemSum number">{{ $v->price * $v->goshop->num }} </em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<!-- <a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a> -->
											<a href="javascript:;" data-point-url="#" class="delete" onclick="">
                  删除					<input type="hidden" class="hiddens" name=""								 value="{{$v->goshop->id}}"></a>	
										</div>
									</li>
								</ul>
							</div>
						@endforeach
<!-- 蒋旺生做的商品购物车页面结尾 -->
				<script type="text/javascript">
						$(function(){
						var i =0;//定义遍历i=0
						$('.check-all').click(function(){//当点击全选按钮时
							$('.check').attr('checked',true);//所有的按钮为选中
							if(i==1){//判断i=0
								$('.check').attr('checked',false);//则全部为不选
							}
							i++;//i++
							if(i>1){//如果i一旦大于1
								i=0;//i=0
							}
						});
						$('.check[type=checkbox]').click(function(){//当按钮点击时
							n = $('.dx:checked').size();//获取所有按钮的长度
							// alert(n)
							$('#J_SelectedItemsCount').text(n)//将当前所有长度放入件数中
							// num = $('.dx:checked').parent().parent().parent().find('.zj').text();
							k = 0;					//定义一个k的变量
							$('.dx:checked').parent().parent().parent().find('.zj').each(function(){		//遍历 所有的金额
								k += parseInt($(this).text());//让k每个值都加上一遍
							})
							// alert(k)
							$('#J_Total').html(k);		//	将结算的总金额放入金额里
						})
						$('.delete').click(function (){		//删除按钮的时候
							s = $(this).find('.hiddens').val()	//获取当前隐藏域里面的id
							// alert(s)
							if(confirm('确认删除吗？')){	//给个判断 
								$.ajax({'url':'/home/goshop/destroy/ss',//发ajax发异步以防止不等待直接运行
									data:{'id':s},//将id传过去删除
									type:'get',//发送类型，推荐用隐式get
									async:false,	//异步等待
									success:function(msg){	//回调函数
										if(msg == 'success') {
											alert('删除成功')
										} else {
											alert('删除失败')
										}
									},
									datatype:'html',//返回类型为html
								})
								$(this).parent().parent().parent().remove();//成功之后删除当前的li标签
							}
						})
						$('.deleteAll').click(function(){	//当点击全部删除时
							if($('.dx:checked').size() == 0){	//判断有没有被选中
								alert('请选择要删除的商品');
								return;
							}
							if(confirm('确认删除吗？')){
						 	arr = [];		//定义一个空数组，来删除多条id
							$('.dx:checked').parent().parent().parent().find('.hiddens').each(function(){		//遍历所有按钮中的隐藏域
								arr.push($(this).val());	//将所有值压入数组中
								// console.log(arr);
							})
							// alert(arr)
							$.ajax({'url':'/home/goshop/create',	//发送ajax
									type:'get',			//get方式
									data:{'arr':arr},	//数据传入
									async:false,	//异步
									success:function(msg){	//回调函数
										if(msg == 'success'){
											alert('删除成功');
										}else{
											alert('删除失败');
										}
									},
								});
							}
						});

					})
				</script>
						</div>
					</tr>
					<div class="clear"></div>
			</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll">删除</a>
						<!-- <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a> -->
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area js">
							<a href="" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<form class="theme-signin" name="loginform" action="" method="post">

						<div class="theme-signin-left">

							<li class="theme-options">
								<div class="cart-title">颜色：</div>
								<ul>
									<li class="sku-line selected">12#川南玛瑙<i></i></li>
									<li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>
								</ul>
							</li>
							<li class="theme-options">
								<div class="cart-title">包装：</div>
								<ul>
									<li class="sku-line selected">包装：裸装<i></i></li>
									<li class="sku-line">两支手袋装（送彩带）<i></i></li>
								</ul>
							</li>
							<div class="theme-options">
								<div class="cart-title number">数量</div>
								<dd>
									<input class="min am-btn am-btn-default" name="" type="button" value="-" />
									<input class="text_box" name="" type="text" value="1" style="width:30px;" />
									<input class="add am-btn am-btn-default" name="" type="button" value="+" />
									<span  class="tb-hidden">库存<span class="stock">1000</span>件</span>
								</dd>

							</div>
							<div class="clear"></div>
							<div class="btn-op">
								<div class="btn am-btn am-btn-warning">确认</div>
								<div class="btn close am-btn am-btn-warning">取消</div>
							</div>

						</div>
						<div class="theme-signin-right">
							<div class="img-info">
								<img src="/static/home/images/kouhong.jpg_80x80.jpg" />
							</div>
							<div class="text-info">
								<span class="J_Price price-now">¥39.00</span>
								<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>