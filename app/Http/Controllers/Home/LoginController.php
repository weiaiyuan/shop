<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\BsPostRequest;
use App\Models\ShopUsers;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
         return view('home.login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(BsPostRequest $request)
    {
       
        $user = $request->input('user');
        $pass = $request->input('pass');
         //获取用户数据
       $arr =  DB::table('shop_users')
                    ->where('uname', '=', $user)
                    ->orWhere('email','=',$user)
                    ->orWhere('phone','=',$user)
                    ->get();

        //获取数据库密码
        foreach ($arr as $key => $value) {
            $password = ($value->pass);
            // dump($password);
            // exit;
        }
        
         if(Hash::check($pass,$password)){
             $res2 = ShopUsers::where('uname',$user) -> orWhere('email',$user) ->orWhere('phone',$user)-> value('id');
              
            session(['username' => $user,'id' => $res2]);
             return redirect('/')->with('success', '登录成功');
        }else{
            return back()->with('error','登录失败');
        }
    }
      public function getOutlogin()
    {
        session(['username'=>null]);
        return redirect('/home/login');
    }
   

}