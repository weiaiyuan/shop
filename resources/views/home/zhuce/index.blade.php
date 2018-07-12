<!DOCTYPE html>
<html>
 <head lang="en"> 
  <meta charset="UTF-8" /> 
  <title>注册</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="stylesheet" href="/static/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" /> 
  <link href="/static/home/css/dlstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/static/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/static/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
  <script src="/static/home/layui/layui.all.js"></script>
  
 </head> 

 <body> 
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <script>
                 layer.alert('{{$error}}', {icon: 6});
               </script>
            @endforeach
        </ul>
    </div>
@endif
  <div class="login-boxtitle"> 
   <a href="home/demo.html"><img alt="" src="/static/home/images/logobig.png" width="100" /></a> 
  </div> 
  <div class="res-banner"> 
   <div class="res-main"> 
    <div class="login-banner-bg"> 
     <span></span> 
     <img src="/static/home/images/big.jpg" /> 
    </div> 
                <div class="login-box">
                    <div class="am-tabs" id="doc-my-tabs">
                        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                            <li class="am-active">
                                <a href="">
                                    邮箱注册
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    手机号注册
                                </a>
                            </li>
                        </ul>
                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-active">
                            <!-- 邮箱 开始-->
                                <form method="post" action="/home/zhuce/insert">
                                	{{ csrf_field() }}
                                    <div class="user-email">
                                        <label for="email">
                                            <i class="am-icon-envelope-o">
                                            </i>
                                        </label>
                                        <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                                    </div>
                                    <div class="user-pass">
                                        <label for="password">
                                            <i class="am-icon-lock">
                                            </i>
                                        </label>
                                        <input type="password" name="pass" id="password" placeholder="设置密码">
                                    </div>
                                    <div class="user-pass">
                                        <label for="passwordRepeat">
                                            <i class="am-icon-lock">
                                            </i>
                                        </label>
                                        <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                                    </div>
                                    <div class="am-cf">
                                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                                </form>
                                <!-- 邮箱结束 -->
                                <div class="login-links">
                                    <label for="reader-me">
                                        <input id="reader-me" type="checkbox">
                                        点击表示您同意商城《服务协议》
                                    </label>
                                </div>
                                
                            </div>
                            <div class="am-tab-panel">
                            <!-- 手机号 -->
                                <form method="post" action="/home/zhuze/homeindex">
                                    {{ csrf_field() }}
                                    <div class="user-phone">
                                        <label for="phone">
                                            <i class="am-icon-mobile-phone am-icon-md">
                                            </i>
                                        </label>
                                        <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                                    </div>
                                    <div class="verification">
                                        <label for="code">
                                            <i class="am-icon-code-fork">
                                            </i>
                                        </label>
                                         <input type="tel" name="phonecode" id="code" placeholder="请输入验证码" style="width:200px;">
                                        <a class="btn" href="javascript:void(0);" onClick="sendCode();"
                                        id="sendMobileCode">
                                        <input type="button" value="获取" id="dyMobileButton" style="font-size:10px;width:100px;height:42px; ">
                                        </a>
                                    </div>
                                    <div class="user-pass">
                                        <label for="password">
                                            <i class="am-icon-lock">
                                            </i>
                                        </label>
                                        <input type="password" name="pass" id="password" placeholder="设置密码">
                                    </div>
                                    <div class="user-pass">
                                        <label for="passwordRepeat">
                                            <i class="am-icon-lock">
                                            </i>
                                        </label>
                                        <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                                    </div>
                                    <div class="am-cf">
                                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>
                                </form>
                                <script type="text/javascript">

                                    // 发送手机短信验证
                                    function sendCode(){
                                       
                                        // 发送短信验证码 时间倒计时
                                        var obj = $("#dyMobileButton");
                                        settime(obj);
                                        // 使用个ajax请求后台
                                        $.get('/home/zhuce/sendcode',{'phone':$('#phone').val()},function(msg){
                                            if(msg==2){
                                                alert('发送成功');
                                            }
                                        },'html'); 
                                    }
                                    /**
                                     * 发送短信验证码 时间倒计时
                                     * @type {Number}
                                     */
                                    var countdown=60; 
                                    function settime(obj) { //发送验证码倒计时
                                        if (countdown == 0) { 
                                            obj.attr('disabled',false); 
                                            //obj.removeattr("disabled"); 
                                            obj.val("获取验证码");
                                            countdown = 60; 
                                            return;
                                        } else { 
                                            obj.attr('disabled',true);
                                            obj.val("重新发送(" + countdown + ")");
                                            countdown--; 
                                        } 
                                    setTimeout(function() { 
                                        settime(obj) }
                                        ,1000) 
                                    }
                                </script>
                                  <div class="login-links">
                                    <label for="reader-me">
                                        <input id="reader-me" type="checkbox">
                                        点击表示您同意商城《服务协议》
                                    </label>
                                </div>
                                <hr>
                            </div>
                            <script>
                                $(function() {
                                    $('#doc-my-tabs').tabs();
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer ">
                <div class="footer-hd ">
                    <p>
                        <a href="/h/# ">
                            恒望科技
                        </a>
                        <b>
                            |
                        </b>
                        <a href="/h/# ">
                            商城首页
                        </a>
                        <b>
                            |
                        </b>
                        <a href="/h/# ">
                            支付宝
                        </a>
                        <b>
                            |
                        </b>
                        <a href="/h/# ">
                            物流
                        </a>
                    </p>
                </div>
                <div class="footer-bd ">
                    <p>
                        <a href="/h/# ">
                            关于恒望
                        </a>
                        <a href="/h/# ">
                            合作伙伴
                        </a>
                        <a href="/h/# ">
                            联系我们
                        </a>
                        <a href="/h/# ">
                            网站地图
                        </a>
                        <em>
                            © 2015-2025 Hengwang.com 版权所有
                        </em>
                    </p>
                </div>
            </div>
    </body>

</html>