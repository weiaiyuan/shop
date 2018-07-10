<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Models\Shopusers;
use App\Models\Shop_goods;
use App\Models\Shop_orders;
use DB;
class OrderController extends Controller
{
    /**
     * [订单表显示页面]
     * @param  Request $request [接收搜索条件]
     * @return order.index页面
     */
    public function getIndex(Request $request)
    {
        $search = $request -> get('search');
        // dump($search);
        $orders = DB::table('shop_orders')
                ->where('id','like','%'.$search.'%')
                ->orWhere('uid','like','%'.$search.'%')
                ->orWhere('status','like','%'.$search.'%')
                ->orWhere('rec','like','%'.$search.'%')
                ->orWhere('tel','like','%'.$search.'%')
                ->orWhere('addr','like','%'.$search.'%')
                -> paginate(3)->appends($request->input());
        return view('admin.order.index',['orders'=>$orders]);
    }

    /**
     * 订单详情页
     * @param  [int] $id [订单表对应id]
     * @return 订单详情展示页面
     */
    public function getDetail($id)
    {
        $shop_goods = Shop_goods::get();            //获取所有的商品
        // dump($shop_goods);
        $order_detail = Order_detail::where('oid','=',$id)->find($id);
        // dump($order_detail);
        return view('admin.order.order_detail',[
                        'order_detail' => $order_detail,
                        'shop_goods' => $shop_goods
                    ]);
    }
}
