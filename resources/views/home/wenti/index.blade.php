    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>report</title>
       <script src="/static/home/layui/layui.all.js"></script>
       <script src="/static/home/layui/layui.js"></script>
        <style type="text/css">
            .Content-Main{
                max-width: 500px;
                margin: auto;
                margin-top: 50px;
                padding: 20px 30px 20px 30px;
                font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
                text-shadow: 1px 1px 1px #FFF;
                border: 1px solid #DDD;
                border-radius: 5px;
                color: #888;
                background: #FFF;
            }
            .Content-Main h1{
                display: block;
                padding: 0px 0px 10px 40px;
                margin: -10px -30px 30px -30px;
                font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
                border-bottom: 1px solid #DADADA;
                color: #888;
            }
            .Content-Main h1>span{
                display: block;
                font-size: 11px;
            }
            .Content-Main label{
                display: block;
                margin: 0px 0px 5px;
            }
            .Content-Main label>span{
                float: left;
                width: 20%;
                padding-right: 10px;
                margin-top: 10px;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: bold;
                text-align: right;
                color: #333;
            }
            .Content-Main input[type="text"],.Content-Main textarea{
                width: 70%;
                height: 20px;
                padding: 5px 0px 5px 5px;
                margin-bottom: 16px;
                margin-right: 6px;
                margin-top: 2px;
                line-height: 15px;
                border-radius: 4px;
                border: 1px solid #CCC;
                color: #888;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }
            .select1{
                width: 71%;
                height: 35px;
                margin-bottom: 16px;
                margin-right: 6px;
                margin-top: 2px;
                line-height: 15px;
                padding: 5px 0px 5px 5px;
                border-radius: 4px;
                border: 1px solid #CCC;
                color: #888;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }
            .select2{
                width: 13%;
                border-radius: 4px;
                border: 1px solid #CCC;
                color: #888;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }
            .Content-Main textarea{
                width: 70%;
                height: 100px;
                padding: 5px 0px 0px 5px;
            }
            .button{
                padding: 10px 25px 10px 25px;
                margin-left: 111px;
                border-radius: 4px;
                border:1px solid #CCC;
                background: #FFF;
                color: #333;
            }
            .button:hover{
                color: #333;
                background-color: #EBEBEB;
                border-color: #ADADAD;
              
            }
        </style>
    </head>
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
    <body  style="background:url(/images/27.jpg) no-repeat 5px 5px;">
    <div class="Content-Main">
        <div class="Content-Main1">
            <h1>问题反馈</h1>
            
        </div>
        <form action="/home/wenti/create" method="post" class="form-report" >
             {{ csrf_field() }}
            <label>
                <span>用户名称:</span>
                <input type="text" placeholder="" name="username">
            </label>
            <label>
                <span>联系电话:</span>
                <input type="text" placeholder="" name="userphone">
            </label>
            <label>
                <span>内容:</span>
                <textarea id="mesaage" name="wenti" placeholder="你可以告诉我"></textarea>
            </label>
            <label>
                <input type="submit" class="button" value="提交">
            </label>
        </form>
    </div>
    </body>
    </html>