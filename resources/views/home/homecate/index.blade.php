@section('content')
<div id="nav" class="navfull">
<div class="area clearfix">
<div class="category-content" id="guide_2">
<div class="category">
			<ul class="category-list" id="js_climit_li">
			@foreach($cate as $k=>$v)
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
			<div class="sort-side">
			<dl class="dl-sort">
			<dt><span title="蛋糕">
			@foreach($cates as $ka=>$va)
			@if($v->id == $va->pid)
				{{$va->cname}}
			@endif
			@endforeach
			</span></dt>
			<dd><a title="蒸蛋糕" href="#"><span>
			@foreach($cates as $ka=>$va)
			@if($v->id == $va->pid)
			@foreach($catess as $kaa=>$vaa)
			@if($va->id == $vaa->pid)
				{{ $vaa->cname }} |
			@endif
			@endforeach
			@endif
			@endforeach
			</span></a></dd>
			</dl>
			</div>
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

@show

											