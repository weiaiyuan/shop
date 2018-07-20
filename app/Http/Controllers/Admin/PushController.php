<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_goods;
use App\Models\Shop_pushs;

class PushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('cname');
        $push = Shop_pushs::paginate(2);
        $goods = Shop_goods::all();
        return view('admin.push.index',['push'=>$push,'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = 0;
        $push = Shop_pushs::all();
        foreach ($push as $k=>$v)
        {
            $a +=1;
        }
        if ($a == 3) {
            return back()->with('error','最大推荐位为3个');
            }
        $goods = Shop_goods::all();
        return view('admin.push.create',['goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = $request->input('direction');
        $uid = $request->input('uid');
        $pp = Shop_pushs::where('direction','=',$p)->orwhere('uid',$uid)->first();
        if ($pp != null) {
            return back()->with('error','该推荐位或商品已被推荐,请重新选择或删除原有的');
        }
        $this->validate($request,[
                'direction'=>'required',
                'uid'=>'required'
            ],[
                'direction.required'=>'请输入推荐位',
                'uid.required'=>'请输入推荐商品'
            ]);
        $push = new Shop_pushs;
        $goods = Shop_goods::all();
        $push -> uid = $request->input('uid');
        $push -> direction = $request->input('direction');
        foreach ($goods as $k=>$v) {
            if ($v->id == $push->uid) {
                $push -> price = $v->gpic;
                }
            }

       
        if ($push -> save()) {
            return redirect('/admin/push')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }
        // dd($push);
        // dd($request->input('direction'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $push = Shop_pushs::onlyTrashed()->paginate();//获取所有被软删除的
        $goods = Shop_goods::all();//获取所有商品信息
        // dd($push);
        return view('admin.push.del',['push'=>$push,'goods'=>$goods]);
    }
    public function getHuifu($id)
    {
        
        $a = Shop_pushs::withTrashed()->find($id)->restore();//恢复被软删除的指定id
        $b = Shop_pushs::where('id',$id)->first();             //查找被恢复的id
        $data = Shop_pushs::all();                              //获取所有
        $c = 0;
        foreach ($data as $k=>$v) 
        {
            if($b->direction == $v->direction) {
                $c += 1;
            }
            if($c > 1){
                $b -> direction = 'no';
                $b -> save();
            }
        }
        if ($a) {
            return redirect('/admin/push/$id')->with('success','恢复成功');
        } else {
            return back()->with('error','恢复失败');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $push = Shop_pushs::find($id);
        // dd($push);
        $good = Shop_goods::all();
        return view('admin.push.edit',['push'=>$push,'goods'=>$good]);
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
        $p = $request->input('direction');
        $pp = Shop_pushs::where('direction','=',$p)->first();
        // dd($pp);
        if ($pp != null) {
            return back()->with('error','该推荐位已存在,请重新选择或回收原有的');
        }
        $this->validate($request,[
                'direction'=>'required',
                'uid'=>'required'
            ],[
                'uid.required'=>'商品名称未选择',
                'direction.required'=>'推荐位未选择'
            ]);
        $push = Shop_pushs::find($id);
        $goods = Shop_goods::all();
        $push -> uid = $request -> input('uid');
           foreach ($goods as $k=>$v) {
            if ($v->id == $push->uid) {
                $push -> price = $v->gpic;
                }
            }
       
        $push -> direction = $request -> input('direction');
        if ($push -> save()) {
            return redirect('/admin/push')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败 ');
        }
    }
    public function postDel($id)
    {
        $a = Shop_pushs::onlyTrashed()->find($id);//获取被软删除的制定id
        $z = $a ->forceDelete();//直接执行删除
        if ($z == null) {       //判断删除完毕是否为空
            return redirect('/admin/push/10000')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
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
        $a = Shop_pushs::destroy($id);
        if($a == 1 ) {
            return redirect('/admin/push')->with('success','回收成功');
        } else {
            return back() -> with('error','回收失败');
        }
    }
}
