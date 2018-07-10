<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_shet;

class ShetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop_shet::get();
        //dump($data);die;
        return view('admin.shet.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shet = new Shop_shet;
        $shet -> title = $request -> input('title');
        //dump($request -> hasFile('logo'));die;
        if($request -> hasFile('logo')){
            $shet -> logo = $request -> file('logo');

            //var_dump($carousel -> img);die;
            $ext = $shet -> logo ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $shet -> logo -> move('./images/',$name);
            //dump($res);
            $shet -> logo = $name;
        }
          //验证添加
        if ($shet -> save()) {
            return redirect('/admin/shet')->with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }
    }


    /**
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Shop_shet::find($id);

        return view('admin.shet.edit',['data'=>$data]);
    }

    /**
     * 修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = shop_shet::find($id);
        //dump($data);
        $data -> title = $request -> input('title');
        if($request -> hasFile('logo')){
            $data -> logo = $request -> file('logo');

            //var_dump($carousel -> img);die;
            $ext = $data -> logo ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $data -> logo -> move('./images/',$name);
            //dump($res);
            $data -> logo = $name;
        }
          //验证添加
        if ($data -> save()) {
            return redirect('/admin/shet')->with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }
    }


    public function show($id)
    {
        $data = shop_shet::onlyTrashed()->get();//获取删除数据
        return view('admin.shet.show',['data'=>$data]);

    }

    /**
     * 软删除数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $shop = Shop_shet::find($id);
        if($shop -> delete()){
            return redirect('/admin/shet/show')->with('success','成功放入回收站'); 
        }else{
            return back()->with('error','放入回收站失败');
        }
    }
    
    /**
     * 恢复回收站数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restores($id)
    {
        Shop_shet::withTrashed()->where('id','=',$id)->restore();
        return redirect('/admin/shet');
    }

    /**
     * 彻底删除数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
       $data = Shop_shet::onlyTrashed()->where('id','=',$id)->first();
       $res = $data ->forceDelete();
       if(empty($res)){
            return back()->with('success','删除成功');
       }else{
        return back()->with('error','删除失败');
       }
    }

    /**
     * 维护开关
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function weihu()
    {   

        return view('admin.shet.weihu');
    }
}
