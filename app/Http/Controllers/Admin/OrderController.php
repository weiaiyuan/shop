<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Models\ShopUsers;
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
        $name = $request ->input('num');
        $orders = Shop_orders::where('num','like','%'.$name.'%')->paginate(3);
        $user = ShopUsers::get();
        //dump($user);
        return view('admin.order.index',['orders'=>$orders,'user'=>$user]);
    }  

     /**
     * [订单表详情页面]
     * @param  Request $request 
     * @return oreder_detail
     */
    public function getDetail()
    {
        $orders = Shop_orders::paginate(3);
        //dd($orders);
        foreach($orders as $k=>$v){
            $gid = $v->gid;
        }
        $good = Shop_goods::where('id',$gid)->first();
        //dump($good);die;
        return view('admin.order.order_detail',['orders'=>$orders,'good'=>$good]);
    }
    /**
     * [修改页面]
     * @param  
     * @return 
     */
    public function getEdit($id)
    {
        $order = Shop_orders::where('id',$id)->first();
        return view('admin.order.edit',['order'=>$order]);
    }
    /**
     * [修改方法]
     * @param  
     * @return 
     */
    public function postUpdate(Request $request, $id)
    {
        
        $status = $request -> input('status');
        $order = Shop_orders::where('id',$id)->first();
        //dump($order);
        $order -> status = $status;
        if($order->save()){
            return redirect('/admin/order/index')->with('success','修改成功');
        }else{
             return back()->with('error','修改失败');
        }

    }
}
