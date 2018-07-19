 @extends('home.layone.index')
  @section('content') 
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
  <div class="user-info"> 
   <!--标题 --> 
   <div class="am-cf am-padding"> 
    <div class="am-fl am-cf">
     <strong class="am-text-danger am-text-lg">个人资料</strong> / 
     <small>Personal&nbsp;information</small>
    </div> 
   </div> 
   <hr /> 
    <form class="am-form am-form-horizontal" action="/home/geren/update/{{session('id')}}" method="post" enctype="multipart/form-data"> 
       {{ csrf_field() }}
   <!--头像 --> 
   <div class="user-infoPic"> 
    <div class="filePic"> 
     <input class="inputPic"  type="file" name="tou"/> 
     <img class="am-circle am-img-thumbnail" src="/uploads/{{$data->tou}}" alt="头像" style="height: 100px;width: 100px;" /> 
    </div> 
    <p class="am-form-help">头像</p> 
    <div class="info-m"> 
     <div>
      <b>用户名：<i>小叮当</i></b>
     </div> 
     <div class="u-level"> 
      <span class="rank r2"> 
       <s class="vip1"></s><a class="classes" href="#">铜牌会员</a> </span> 
     </div> 
     <div class="u-safety"> 
      <a href="safety.html"> 账户安全 <span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span> </a> 
     </div> 
    </div> 
   </div> 
   <!--个人信息 --> 
   <div class="info-main"> 
   
     <div class="am-form-group"> 
      <label for="user-name2" class="am-form-label">昵称</label> 
      <div class="am-form-content"> 
       <input id="user-name2" placeholder="nickname" type="text" name="uname" value="{{$data->uname}}" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label class="am-form-label">性别</label> 
      <div class="am-form-content sex"> 
       <label class="am-radio-inline"> 
        <input   data-am-ucheck="" class="am-ucheck-radio" type="radio" name="sex" value="m" @if($data ->sex=='m') checked @endif />
        <span class="am-ucheck-icons">
          <i class="am-icon-unchecked"></i>
          <i class="am-icon-checked"></i>
        </span> 男 </label> 

       <label class="am-radio-inline"> 
        <input   data-am-ucheck="" class="am-ucheck-radio" type="radio" name="sex" value="w" @if($data ->sex=='w') checked @endif/>
        <span class="am-ucheck-icons">
        <i class="am-icon-unchecked"></i><i class="am-icon-checked"></i>
      </span> 女 </label> 
       <label class="am-radio-inline">
        <input   data-am-ucheck="" class="am-ucheck-radio" type="radio" name="sex" value="x" @if($data ->sex=='x') checked @endif/>
        <span class="am-ucheck-icons">
          <i class="am-icon-unchecked"></i>
          <i class="am-icon-checked"></i>   
        </span> 保密 </label> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">电话</label> 
      <div class="am-form-content"> 
       <input id="user-phone" placeholder="telephonenumber" type="tel" name="phone" value="{{$data->phone}}" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-email" class="am-form-label">电子邮件</label> 
      <div class="am-form-content"> 
       <input id="user-email" placeholder="Email" type="email" name="email" value="{{$data->email}}" /> 
      </div> 
     </div> 
     <div class="am-form-group address"> 
      <label for="user-address" class="am-form-label">收货地址</label> 
      <div class="am-form-content address"> 
       <a href="address.html"> <p class="new-mu_l2cw"> <span class="province">湖北</span>省 <span class="city">武汉</span>市 <span class="dist">洪山</span>区 <span class="street">雄楚大道666号(中南财经政法大学)</span> <span class="am-icon-angle-right"></span> </p> </a> 
      </div> 
     </div> 
     <div class="am-form-group safety"> 
      <label for="user-safety" class="am-form-label">账号安全</label> 
      <div class="am-form-content safety"> 
       <a href="safety.html"> <span class="am-icon-angle-right"></span> </a> 
      </div> 
     </div> 
     <div class="info-btn"> 
     
       <button type="submit" class="am-btn am-btn-danger">保存修改</button>
      
     </div> 
    </form> 
   </div> 
  </div> 
  @endsection 
