<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_goods;
use App\Http\Requests\GoodInsertRequest;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Shop_goods::paginate(2);
        return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodInsertRequest $request)
    {
        // $this->validate($request,[
        //         'gname' => 'required|unique:shop_goods',
        //         'price' => 'required',
        //         'title' => 'required',
        //         'gpic' => 'required',
        //         'desc' => 'required'
        //     ],[
        //     'gname.required'=>'名称未填写',
        //     'price.required'=>'价格未填写',
        //     'title.required'=>'主题未填写',
        //     'gpic.required'=>'图片未提交',
        //     'desc.required'=>'描述未填写',
        //     ]);
        //     
        //获取文件
        $file = $request->file('gpic');
        // dump($file);
        //获取文件扩展名
        $ext = $file->getClientOriginalExtension();
        // dump($ext);
        //获取随机数
        $str = str_random(20);
        $filename = $str.'.'.$ext;
        $data = date('Ymd',time());
        // echo $str;//存入public公共部分中
        $file -> move('./images/goods/'.$data,$filename);
        $goods = new Shop_goods;
        // dd($data.'/'.$filename);
        $goods -> gpic = $data.'/'.$filename;

        $goods -> gname = $request -> input('gname','');
        $goods -> price = $request -> input('price','');
        $goods -> desc = $request -> input('desc','');
        $goods -> title = $request -> input('title','');
        if ($goods -> save()) {
            return redirect('/admin/good')->with('success','添加成功！');
        }else{
            return back()->with('error','添加失败！');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        // $data = Shop_goods::find($id);s
        $data = Shop_goods::where('id','=',$id)->first();
        // dump($data);
        return view('admin.goods.edit',['data'=>$data,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(GoodInsertRequest $request,$id)
    {
        // $this->validate($request,[
        //         'gname' => 'required|unique:shop_goods',
        //         'price' => 'required',
        //         'title' => 'required',
        //         'gpic' => 'required',
        //         'desc' => 'required'
        //     ],[
        //     'gname.required'=>'名称未填写',
        //     'price.required'=>'价格未填写',
        //     'title.required'=>'主题未填写',
        //     'gpic.required'=>'图片未提交',
        //     'desc.required'=>'描述未填写',
        //     ]);
        //     
        //获取文件
        $file = $request->file('gpic');
        // dump($file);
        //获取文件扩展名
        $ext = $file->getClientOriginalExtension();
        // dump($ext);
        //获取随机数
        $str = str_random(20);
        $filename = $str.'.'.$ext;
        $data = date('Ymd',time());
        // echo $str;//存入public公共部分中
        $file -> move('./images/goods/'.$data,$filename);
       $goods = Shop_goods::find($id);
        // dd($data.'/'.$filename);
        $goods -> gpic = $data.'/'.$filename;

        $goods -> gname = $request -> input('gname','');
        $goods -> price = $request -> input('price','');
        $goods -> desc = $request -> input('desc','');
        $goods -> title = $request -> input('title','');
        if ($goods -> save()) {
            return redirect('/admin/good')->with('success','修改成功！');
        }else{
            return back()->with('error','修改失败！');
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
        $data = Shop_goods::destroy($id);
       
        if($data == 0){
            return redirect('/admin/good')->with('error','回收失败');
        } else {
            return redirect('/admin/good')->with('success','回收成功');
        }
    }

}
