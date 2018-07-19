<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\ShopUsers;
use Hash;
use App\Http\Requests\BsPostRequest;
class GerenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {     
         //继承logo分配
         $logos = DB::table('shop_shet')->first();
         return view('home.layone.index',['logos'=>$logos]);
    }

    public function getDall()
    {     
        //个人logo分配
         $logos = DB::table('shop_shet')->first();
        
         $id = session('id');
         $data = DB::table('shop_users')->where('id',$id)->first();
       
       

        return view('home.geren.index',['logos'=>$logos,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request,$id)
    {    
         $data = $request->except(['_token']); 
        
            $user = ShopUsers::find($id);
            $user->uname = $data['uname'];
            $user->sex = $data['sex'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            if ($request->hasFile('tou')) {
            // 使用request 创建文件上传对象
            $profile = $request->file('tou');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name = $temp_name . '.' . $ext;
            $dirname = date('Ymd', time());
            $res = $profile->move('./uploads/' . $dirname, $name);
            $data['tou'] = $res;
            //dd($data);
            $user->tou = $dirname . '/' . $name;
        }
        if ($user->save()) {
        
            return redirect('/home/geren/dall')->with('success','修改成功');
        }
            return back()->with('error','修改失败');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow()
    {
        $logos = DB::table('shop_shet')->first();
         return view('home.geren.pass',['logos'=>$logos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postPass(Request $request)
    {
        $data = $request->except(['_token']); 
        $id = session('id');
        $user = ShopUsers::find($id);
        $pass = $data['pass'];
        $repass = $data['repass'];
       
        if($pass == $repass){
               $user->pass = Hash::make($pass); 
               $user->save();
           return back()->with('success','修改成功');
        }else{
             
            return back()->with('error','修改失败');
        }
      
        

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}