<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Userdetail;
use App\User;
use App\Models\ShopUsers;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //用户添加视图
        //搜索 //分页
        $data = $request -> input('user');
       
        $user = DB::table('shop_users')
        ->where('uname','like','%'.$data.'%')
        ->orWhere('email','like','%'.$data.'%')
         ->orWhere('phone','like','%'.$data.'%')
        ->paginate(5)->appends($request->input());
        return view('admin.user.list',['user'=>$user,'data'=>$data]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
          
          
          return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $request->except(['_token']); 
             $user = new ShopUsers;
                  $user->uname = $data['uname'] ;
              $user->pass = $data['pass'];
              $user->repass = $data['repass'];
              $user->qx = $data['qx'];
              $user->sex=$data['sex'];
              $user->email=$data['email'];
              $user->phone=$data['phone'];
              //头像
             if($request -> hasFile('tou')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('tou');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $res = $profile -> move('./uploads/'.$dirname,$name);
             }

              $data['tou'] = $res;
              $user->tou=$dirname.'/'.$name;
             // dump($user->tou);die;
              $user->save();
            return redirect('/admin/user');

    

             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('shop_users')->where('id','=',$id)->first();
              
               
               
        return view('admin.user.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
              $data = $request -> except(['_token','_method']);
              $user = ShopUsers::find($id); 
              $user->uname = $data['uname'] ;
              $user->pass = $data['pass'];
              $user->repass = $data['repass'];
              $user->qx = $data['qx'];
              $user->sex=$data['sex'];
              $user->email=$data['email'];
              $user->phone=$data['phone'];
             if($request -> hasFile('tou')){

            // 使用request 创建文件上传对象
             $profile = $request -> file('tou');
             $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
             $temp_name = str_random(20);
             $name =  $temp_name.'.'.$ext;
             $dirname = date('Ymd',time());
             $res = $profile -> move('./uploads/'.$dirname,$name);
               $data['tou'] = $res;
              $user->tou=$dirname.'/'.$name;
             }

            
            
              $user->save();
            return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          DB::table('shop_users')->where('id','=',$id)->delete();
          return redirect('/admin/user');
    }
}
