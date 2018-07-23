<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_orders;
use App\Models\Shop_goods;
use App\Models\Shop_address;
use App\Models\Goshop;
class JsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        //
        $gid =  $request->input('id');
        $num =  $request->input('num');
        $orders = new Shop_orders;
        $orders -> gid = $gid;
        $orders -> rec = $num;
        $orders -> pack = $request->input('pack');
        $str = str_random(12);
        $orders -> num = $str;
        $orders -> sum = $request->input('sum');
        if ($orders->save()) {
            echo 'success';
        }else{
            echo 'error';
        }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        $goshop = Goshop::all();
        $a = [];
        foreach ($goshop as $key => $value) {
            $a[] = $value->id;
        }
        $num = 0;
        foreach ($a as $key => $value) {
            $num += 1;
        }
        $orders = Shop_orders::all();
        $arr = [];
        foreach ($orders as $key => $value) {
            $arr[]=$value->gid;
        }
        $order = Shop_goods::find($arr);
        $address = Shop_address::where('uid',1)->get();
        // dd($address);
        // dd($order);
        return view('home.homecate.js',['order'=>$order,'num'=>$num,'address'=>$address]);
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
    public function getShow(Request $request)
    {
            $id = $request->input('id');
            $sum = $request->input('sum');
            $num = $request->input('num');
            // dump($num);
            // dump($sum);
            // dump($id);
            foreach ($id as $k=>$v)             //遍历接受过来的所有gid(商品id)
            {
                $order = new Shop_orders;          //实例化订单页面
                $order -> gid = $v;
              foreach ($sum as $kk=>$vv)        //遍历所有的金额
            {       
                if($k == $kk) {                 //当gid的下标与金额的下标对应时才存入
                    $order -> sum = $vv;
                }
            }
            foreach ($num as $kkk=>$vvv)        //同上
            {
               if($k == $kkk) {
                    $order -> rec = $vvv;
                }
            }
                $str = str_random(15);
                $order -> num = $str;
                $order -> save();               //保存
                $goshop = Goshop::where('gid',$v)->first();     //查询所有与购物车中与当前遍历的gid对应的
                $order = Shop_orders::where('gid',$v)->first(); //将订单内刚存入的商品id对应查找
                $order->pack = $goshop->pack;                   //包装赋予包装
                if($order->save())                              //再次保存
                {
                    echo 'success';
                } else {
                    echo 'error';
                }                                
                                                   //我真聪明$k对$k都能想出来吼吼吼吼^_^
            // dump($order);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit()
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
    public function getUpdate()
    {
        //
        //
        $goshop = Goshop::all();
        $a = [];
        foreach ($goshop as $key => $value) {
            $a[] = $value->id;
        }
        $num = 0;
        foreach ($a as $key => $value) {
            $num += 1;
        }
         return view('home.homecate.goumai',['num'=>$num]);
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
