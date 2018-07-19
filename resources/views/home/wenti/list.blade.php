    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>report</title>
       <script src="/static/home/layui/layui.all.js"></script>
       <script src="/static/home/layui/layui.js"></script>
       <link rel="stylesheet" type="text/css" href="/static/home/bootstrap-3.3.7-dist/css/bootstrap.min.css">
       <script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
       <script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <style type="text/css">
            .Content-Main{
                max-width: 900px;
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
            <a href="/"><h1>反馈列表</h1></a>           
        </div>
         <table class="table table-bordered text-center table-hover table-condensed">
            <tr class="text-success bg-info">
                <td>用户名</td>
                <td>联系电话</td>
                <td>反馈内容</td>
                <td>解答</td>
                <td>操作</td>
            </tr>
                @foreach ($data as $k=>$v)
            <tr>
                <td>{{$v->username}}</td>
                <td>{{$v->userphone}}</td>
                <td>{{$v->wenti}}</td>
                <td>{{$v->fankui}}</td>
                <td>
                    <a href="/home/wenti/del/{{$v->id}}" title="点击删除"><span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#000;font-size: 20px;margin-right: 10px;"></span></a>
                </td>
            </tr>
              @endforeach
        </table>
    </div>
    </body>
    </html>