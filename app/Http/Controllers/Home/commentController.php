<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_orders;
use App\Models\ShopUsers;
use App\Models\Shop_goods;
use App\Models\Shop_coms;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $uid = 3;//这里需要登录用户的id
        $com = Shop_coms::where('uid',$uid)->get();
        //dump($com);die;
        return view('home.comment.index',['com'=>$com]);
    }

    /**
     * Show the foorm for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate($num)
    {
        $order = Shop_orders::where('num',$num)->first();
        //dd($order);
        $gid = $order->gid;
        // dump($gid);
        // exit;
        // 获取商品中的数据
        $data = Shop_goods::find($gid);
        //dd($data);
        $uid = $order->uid;
        // 用户的信息
        //$uname = ShopUsers::find($uid);
        return view('home.comment.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStore(Request $request)
    {
        $gid = $request-> input('gid');
        $oid = Shop_orders::where('gid',$gid)->first();
        $goods = Shop_goods::where('id',$gid)->first();
        //添加评价表中的数据
        $a=$request->input('hp');
        $res=new Shop_coms;
        $res->gname = $goods->gname;
        $res->gimg = $goods->gpic;
        $res->num = $oid->num;
        $res->gid = $gid;
        $res->oid = $oid->id;
        $res->uid = $oid->uid;
        $res->content = $request-> input('content');
        $res->hp=$a;
        if($res->save()){
            echo 'success';    
        }else{
            echo "error";
        }
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
    public function destroy($id)
    {
        //
    }
}
