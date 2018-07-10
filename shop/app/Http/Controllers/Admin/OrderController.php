<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Models\Shopusers;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    // 订单详情
    public function getDetail($id)
    {
        $order = Orders::find($id);
        $users = Shopusers::get();
        $order_detail = Order_detail::where('oid','=',$id)->find($id);
        // dump($order_detail);
        return view('admin.order.order_detail',['order'=>$order,'order_detail'=>$order_detail]);
    }
}
