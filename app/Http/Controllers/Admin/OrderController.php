<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orders;
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
        $data = DB::table('shop_orders')
                ->where('id','like','%'.$search.'%')
                ->orWhere('uid','like','%'.$search.'%')
                ->orWhere('orderstatus','like','%'.$search.'%')
                -> paginate(3)->appends($request->input());
        return view('admin.order.index',['data'=>$data]);
    }

    public function getDetail($id)
    {
        echo $id;
    }
}
