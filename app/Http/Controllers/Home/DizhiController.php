<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Shop_address;
class DizhiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
         $logos = DB::table('shop_shet')->first();
         $uid = session('id');
         
         $dizhi = DB::table('Shop_address')->where('uid','=',$uid)->get();
         
       
         return view('home.dizhi.index',['logos'=>$logos,'dizhi'=>$dizhi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
         $data = $request->except(['_token']);
         $user = new Shop_address;
          $id = session('id');
         $user->uid = $id;
         $user->username = $data['username'];
         $user->userphone = $data['userphone'];
         $user->province = $data['province'];
         $user->country = $data['country'];
         $user->town = $data['town'];
         $user->address = $data['address'];
         if ($user->save()) {
            return redirect('/home/dizhi/index')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }
    }

    public function getDel($id)
    {
         $soft = Shop_address::find($id);
          if ($soft->delete()) {
            return redirect('/home/dizhi/index')->with('success','删除成功');
        } else {
            return back() -> with('error','删除失败');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function getEdit($id)
    {
         $logos = DB::table('shop_shet')->first();
        
         $dizhi = DB::table('Shop_address')->find($id);
         
       
         return view('home.dizhi.edit',['logos'=>$logos,'dizhi'=>$dizhi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request,$id)
    {
        $data = $request->except(['_token']);
          $user = Shop_address::find($id);
         $user->username = $data['username'];
         $user->userphone = $data['userphone'];
         $user->province = $data['province'];
         $user->country = $data['country'];
         $user->town = $data['town'];
         $user->address = $data['address'];
         if ($user->save()) {
            return redirect('/home/dizhi/index')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }
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
