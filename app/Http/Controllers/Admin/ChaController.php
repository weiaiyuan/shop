<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_goods;

class ChaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($id)
    {
        $data = Shop_goods::find($id);
        return view('admin.goods.look',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $data = Shop_goods::onlyTrashed()->paginate(3);
        return view('admin.goods.show',['data'=>$data]);
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
         $data = Shop_goods::where('gname','like','%'.$request->input('name').'%')->paginate();
          return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $a = Shop_goods::withTrashed()->where('id', $id)->restore();
        if($a = 0) {
            return back()->with('error','恢复失败');
        } else {
            return back()->with('success','恢复成功');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        $ids = Shop_goods::onlyTrashed()->find($id); 
        $res = $ids ->forceDelete();
        if( $res == 0 ) {
            return back()->with('success','永久删除成功');
        } else {
            return back()->with('error','永久删除失败');
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
