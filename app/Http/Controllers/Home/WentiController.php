<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_wenti;
use DB;
class WentiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('home.wenti.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
          $data = $request->except(['_token']);
          $user = new Shop_wenti;
             $user->username = $data['username'];
             $user->userphone = $data['userphone'];
             $user->wenti = $data['wenti'];
        if ($user->save()) {
            return redirect('/home/wenti/show')->with('success', '反馈成功');
        } else {
            return back()->with('error', '反馈失败');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStore(Request $request,$id)
    {
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow()
    {
      
         $data = DB::table('shop_wenti')->get();
        
         return view('home.wenti.list',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function getDel($id)
    {
         $soft = Shop_wenti::find($id);
          if ($soft->delete()) {
            return redirect('/home/wenti/show')->with('success','删除成功');
        } else {
            return back() -> with('error','删除失败');
        }
    }
}
