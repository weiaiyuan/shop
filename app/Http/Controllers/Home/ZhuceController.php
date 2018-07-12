<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ZhucePostRequest;
use App\Http\Requests\ZhucetowPostRequest;
use DB;
use Hash;
use Mail;
class ZhuceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function getIndex()
    {
       return view('home.zhuce.index');
    }

    public function postInsert(ZhucePostRequest $request)
    {
        $arr['email'] = $request->input('email');
        $arr['pass'] = Hash::make($request->input('pass'));
        $arr['token'] = str_random(50);
        $id =  DB::table('shop_users')->insertGetId($arr);
       $request->all();
        

        if($id){
               $token = $arr['token'];
                $email = $arr['email'];
                //发送者  $email;
                //发送者id $id
                //token验证 $token
                //
               
               self::sendmail($email,$id,$token);
              echo '注册成功';
        }else{
            echo '注册失败';
        }
    }

    //激活用户状态
    public function getJihuo($id,$token,Request $request)
    {
     $user = DB::table('shop_users')->where('id',$id)->first(); 
       if($user->token == $token){
          if($user->status == 1){
            $res =  DB::table('shop_users')->where('id',$id)->update(['status'=>2,'token'=>str_random(50)]);
        
          //处理激活结果
                         if($res){
                            echo '激活成功';
                         }else{
                            echo '激活失败';
                         }
            }else{
                echo '用户已激活';
            }
          }else{
            echo '无效链接';
         }
        

       }
    //ajax方法  专门发送手机短信验证
    public function getSendcode(Request $request){
       $phone = $request->input('phone','13366572482');
       dump($phone);die;
        // 15946089699
        $str = rand(1000,9999);
        session(['phonecode'=>$str]);
        // 发送短信的接口
        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C34803185&password=58503c188339550ae777168dd5a5fad1&mobile='.$phone.'&format=json&content=您的验证码是：'.$str.'。请不要把验证码泄露给其他人。';
        $ch = curl_init();
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        $arr = json_decode ($res , true);
        // var_dump($res);
        echo $arr['code'];
    }
   //使用手机号注册
    public function postHomeindex(ZhucetowPostRequest $request)
    {
        // dump($request->all());
         $arr['phone'] = $request->input('phone');
         $arr['pass']=Hash::make($request->input('pass'));
      
         DB::table('shop_users')->insert($arr);

        //  if(session('phonecode') != $request->input('phonecode')){
        //     echo '<script>alert("手机验证码错误")</script>';
        // }else{
        //     echo '<script>alert("注册成功")</script>';
        // }
    }
    
    //发送邮件
        static public function sendmail($email,$id,$token)
    {
        // view('index',[]);
        // 发送邮件
         Mail::send('home.email.email', ['id'=>$id,'token'=>$token], function ($m) use ($email) {
            // $m->from('hello@app.com', 'Your Application');
            // 发送邮件
            $m->to($email)->subject('注册邮件，点击激活');
        });
    }
  
}
