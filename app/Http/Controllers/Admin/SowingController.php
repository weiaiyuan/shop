<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Shop_sowing;
 class SowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
         $data =DB::table('shop_sowing')->paginate();
         $data =DB::table('shop_sowing')->paginate(3);
        return view('admin.sowing.list',['data'=>$data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
      
        return view('admin.sowing.create');
    }

    public function postAdd(request $request)
    {
         $data = $request->except(['_token']); 

            $sowing = new Shop_sowing;
         
           //dump($request -> hasFile('logo'));die;
           if($request -> hasFile('pic')){
            $sowing -> pic = $request -> file('pic');

            //var_dump($carousel -> img);die;
            $ext = $sowing -> pic ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $sowing -> pic -> move('./images/',$name);
            //dump($res);
            $sowing -> pic = $name;

        }
          //验证添加
        if ($sowing -> save()) {
            return redirect('/admin/sowing/')->with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }
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
    public function getEdit($id)
    {
         $data = Shop_sowing::find($id);     
         return view('admin.sowing.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
            
         $data = Shop_sowing::find($id);  

            //$sowing = new Shop_sowing;
             

           // dump($request -> hasFile('pic'));die;
           if($request -> hasFile('pic')){
            $data -> pic = $request -> file('pic');

            //var_dump($carousel -> img);die;
            $ext = $data -> pic ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $data -> pic -> move('./images/',$name);
            //dump($res);
            $data -> pic = $name;

        }

          //验证添加
        if ($data -> save()) {
            return redirect('/admin/sowing/')->with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDel($id)
    {
         $soft = Shop_sowing::find($id);
         $soft->delete();  
         return back();
    }
}

