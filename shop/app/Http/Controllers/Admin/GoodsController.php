<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_goods;
use App\Models\Shop_cates;
use App\Http\Requests\GoodInsertRequest;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cate = Shop_cates::all();
        $data = Shop_goods::where('gname','like','%'.$request->input('cname').'%')->paginate(1)->appends($request->input());
        return view('admin.goods.index',['data'=>$data,'cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Shop_cates::all();
        foreach($data as $k=>$v) 
        {
            // 统计，号的次数
            $n = substr_count($v->path,',');
            $v->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.goods.create',['data'=>$data]);
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
        // dd($request->input('color'));
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
        $ids = $request->input('cid');//获取当前cid的值
        $path = Shop_cates::find($ids);    //获取在cid中的
        if(substr_count($path->path,',') != 2) {
            return back()->with('error','必需选择3级分类');
        }
        $goods = new Shop_goods;
        // dd($data.'/'.$filename);
        $goods -> gpic = $data.'/'.$filename;
        $goods -> cid = $ids;
        $goods -> gname = $request -> input('gname','');
        $goods -> price = $request -> input('price','');
        $goods -> desc = $request -> input('desc','');
        $goods -> title = $request -> input('title','');
        $goods -> color = $request -> input('color','');
        $goods -> pack = $request -> input('pack','');
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
        $cates = Shop_cates::all();
        foreach($cates as $k=>$v) 
        {
            // 统计，号的次数
            $n = substr_count($v->path,',');
            $v->cname = str_repeat('|----',$n).$v->cname;
        }
        // dd($data->pack);
        return view('admin.goods.edit',['data'=>$data,'id'=>$id,'cates'=>$cates]);
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
        $ids = $request->input('cid');//获取当前cid的值
        $path = Shop_cates::find($ids);    //获取在cid中的
        if(substr_count($path->path,',') != 2) {
            return back()->with('error','必选选择3级分类');
        }
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
        $goods -> cid = $ids;
        $goods -> gname = $request -> input('gname','');
        $goods -> pack = $request -> input('pack','');
        $goods -> color = $request -> input('color','');
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
