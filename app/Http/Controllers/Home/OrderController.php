<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_orders;
use App\Models\Shop_goods;
use App\Models\Goshop;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $uid = (session('id'));//这里是登录用户的id
        $order = Shop_orders::where('uid',$uid)->get();
        //dd($order);
        $gid=[];
        foreach ($order as $k=>$v){
            $gid []= $v->gid;
        }
        $good = Shop_goods::find($gid);
        //购物车数量
        $goshop = Goshop::all();
        $gid = [];
        foreach ($goshop as $k=>$v) 
        {
            $gid[] = $v->gid;
        }
        // dd($gid);
        $num = 0;
        foreach ($gid as $key => $value) {
            $num += 1;
        }
        return view('home.order.index',['order'=>$order,'good'=>$good,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function getShow($num)
    {

        $order = Shop_orders::where('num','=',$num)->first();
        //$num = $order->num;
        //$good = Shop_goods::where('id',$gid)->get();
        dump($order);
        return view('home.order.show',['order'=>$order]);
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
