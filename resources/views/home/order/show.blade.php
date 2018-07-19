@extends('home.layone.index')

@section('content')
<div class="user-orderinfo">

	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
	</div>
	<hr>
	<!--进度条-->
	<div class="m-progress">
		<div class="m-progress-list">
			<span class="step-1 step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">1<em class="bg"></em></i>
               <p class="stage-name">拍下商品</p>
            </span>
			<span class="step-2 step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">2<em class="bg"></em></i>
               <p class="stage-name">卖家发货</p>
            </span>
			<span class="step-3 step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">3<em class="bg"></em></i>
               <p class="stage-name">确认收货</p>
            </span>
			<span class="step-4 step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">4<em class="bg"></em></i>
               <p class="stage-name">交易完成</p>
            </span>
			<span class="u-progress-placeholder"></span>
		</div>
		<div class="u-progress-bar total-steps-2">
			<div class="u-progress-bar-inner"></div>
		</div>
	</div>
	<div class="order-infoaside">
		<div class="order-logistics">
			<a href="logistics.html">
				<div class="icon-log">
					<i><img src="/static/home/images/receive.png"></i>
				</div>
				</a><div class="latest-logistics"><a href="logistics.html">
					<p class="text">已签收,签收人是青年城签收，感谢使用天天快递，期待再次为您服务</p>
					<div class="time-list">
						<span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
					</div>
					</a><div class="inquire"><a href="logistics.html">
						<span class="package-detail">物流：天天快递</span>
						<span class="package-detail">快递单号: </span>
						<span class="package-number">373269427868</span>
						</a><a href="logistics.html">查看</a>
					</div>
				</div>
				<span class="am-icon-angle-right icon"></span>
			
			<div class="clear"></div>
		</div>
		<div class="order-addresslist">
			<div class="order-address">
				<div class="icon-add">
				</div>
				<p class="new-tit new-p-re">
					<span class="new-txt">小叮当</span>
					<span class="new-txt-rd2">159****1622</span>
				</p>
				<div class="new-mu_l2a new-p-re">
					<p class="new-mu_l2cw">
						<span class="title">收货地址：</span>
						<span class="province">湖北</span>省
						<span class="city">武汉</span>市
						<span class="dist">洪山</span>区
						<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
				</div>
			</div>
		</div>
	</div>
	<div class="order-infomain">

		<div class="order-top">
			<div class="th th-item">
				商品
			</div>
			<div class="th th-price">
				单价
			</div>
			<div class="th th-number">
				数量
			</div>
			<div class="th th-operation">
				商品操作
			</div>
			<div class="th th-amount">
				合计
			</div>
			<div class="th th-status">
				交易状态
			</div>
			<div class="th th-change">
				交易操作
			</div>
		</div>

		<div class="order-main">

			<div class="order-status3">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">{{ $order->num }}</a></div>
					<span>成交时间：{{ $order -> created_at }}</span>
					<!--    <em>店铺：小桔灯</em>-->
				</div>
				<div class="order-content">
					<div class="order-left">
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="/static/home/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="item-info">颜色：12#川南玛瑙
												<br>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									退款/退货
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="/static/home/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
											<p class="item-info">颜色分类：李清照
												<br>尺码：均码</p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									退款/退货
								</div>
							</li>
						</ul>

					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：{{ $order->sum }}
								<p>含运费：<span>10.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus">卖家已发货</p>
									<p class="order-info"><a href="logistics.html">查看物流</a></p>
									<p class="order-info"><a href="#">延长收货</a></p>
								</div>
							</li>
							<li class="td td-change">
								<div class="am-btn am-btn-danger anniu">
									确认收货</div>
							</li>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection