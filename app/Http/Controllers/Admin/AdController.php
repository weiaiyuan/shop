<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_ad;
use App\Http\Requests\AdInsertRuquest;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $data = Shop_ad::where('gname','like','%'.$name.'%')->paginate(2)->appends($request->input());
        //dump($data);
        return view('admin.ad.index',['data'=>$data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ad.created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdInsertRuquest $request)
    {
        $ad = new Shop_ad;
        $ad -> gname = $request -> input('gname');
        $ad -> gurl = $request -> input('gurl');
        $ad -> pid = $request -> input('pid');
        $ad -> start = $request -> input('start');
        $ad -> end = $request -> input('end');
        //dump($request -> hasfile('files'));die;
        if($request -> hasfile('files')){
            $ad -> files = $request -> file('files');
            //获取图片后缀名
            $res = $ad -> files ->getClientOriginalExtension();
            //获取一个20位的随机数
            $shop_name = str_random(20);
            //拼接名字
            $name = $shop_name.'.'.$res;
            $ad -> files -> move('./images/ad/',$name);
            $ad -> files = $name;
        }
              
        if ($ad -> save()) {
            return redirect('/admin/ad')->with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $name = $request -> input('name');
        $data = Shop_ad::onlyTrashed()->where('gname','like','%'.$name.'%')->paginate(3)->appends($request->input());
        //dump($data);
        return view('admin.ad.recycle',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Shop_ad::find($id);
        return view('admin/ad.edit',['data'=>$data]);
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
        $data = Shop_ad::find($id);
        //dump($data);
        $data -> gname = $request -> input('gname');
        $data -> gurl = $request -> input('gurl');
        $data -> pid = $request -> input('pid');
        $data -> start = $request -> input('start');
        $data -> end = $request -> input('end');
        //dump($request -> hasfile('files'));die;
        if($request -> hasfile('files')){
            $data -> files = $request -> file('files');
            //获取图片后缀名
            $res = $data -> files ->getClientOriginalExtension();
            //获取一个20位的随机数
            $shop_name = str_random(20);
            //拼接名字
            $name = $shop_name.'.'.$res;
            $data -> files -> move('./images/ad/',$name);
            $data -> files = $name;
        }
              
        if ($data -> save()) {
            return redirect('/admin/ad')->with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }
        
    }

    /**
     * 软删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Shop_ad::find($id);
        $res = $data -> delete();
        //dump($res);
        if($res){
            return redirect('/admin/ad/restores')->with('success','放入回收站');
        }else{
            return back()->with('error','删除失败')->with('error','放入回收站失败');
        }
    }

    /**
     * 恢复软删除数据 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *//**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restores($id)
    {
        $data = Shop_ad::withTrashed()->where('id',$id)->restore();
        if($data){
            return back()->with('success','数据已恢复');
        }else{
            return back()->with('error','数据恢复异常');
        }
    }

    /**
     * 彻底删除数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *//**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
       $data = Shop_ad::onlyTrashed()->where('id','=',$id)->first();
        $res = $data -> forceDelete();
        if(empty($res)){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

}
