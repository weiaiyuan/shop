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
use App\Http\Requests\OrdereditRequest;
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
                ->orWhere('phone','like','%'.$search.'%')
                ->orWhere('addr','like','%'.$search.'%')
                -> paginate(3)->appends($request->input());
        // dump($orders);
        $shop_users = Shopusers::get();
        // dump($shop_users);
        return view('admin.order.index',['orders'=>$orders,'shop_users'=>$shop_users]);
    }

    /**
     * 订单详情页
     * @param  [int] $id [订单表对应id]
     * @return 订单详情展示页面
     */
    public function getDetail($id)
    {

        $shop_goods = Shop_goods::get();        // 获取所有的商品信息
        // dump($shop_goods);

        $order_detail = Shop_orders::find($id);      // 订单详情
        // dump($order_detail);
        // exit;
        return view('admin.order.order_detail',[
                        'order_detail' => $order_detail,
                        'shop_goods'  => $shop_goods,
                    ]);
    }

    /**
     *  订单编辑页面 收货地址 收货人 联系电话的修改
     *
     */
    public function getEdit($id)
    {
        $order_edit = Shop_orders::find($id);
        // dump($order_edit);
        return view('admin.order.order_edit',['order_edit'=>$order_edit]);
    }

    /**
     * 更新修改
     */
    public function postUpdate(OrdereditRequest $request,$id)
    {
        $data = $request -> except('_token');
        // dump($data);
        $order = Shop_orders::find($id);
        $order ->rec = $request -> input('rec');
        $order ->phone = $request -> input('phone');
        $order ->addr = $request -> input('addr');

        if ($order -> save()) {
            return redirect('/admin/order/detail/'.$id)->with('success','修改成功！');
        }else{
            return back()->with('error','修改失败！');
        }
    }
}
