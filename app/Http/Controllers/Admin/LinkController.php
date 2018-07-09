<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkInsertRequest;
use App\Models\Shop_link;
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('shop_link')->paginate(2);
        return view('admin.link.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.link.cates');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkInsertRequest $request)
    {
        //添加
         $fri = new Shop_link;
        $fri -> lname = $request -> input('lname','');

        if($request -> hasFile('limg')){
            $fri -> limg = $request -> file('limg');

            //var_dump($carousel -> img);die;
            $ext = $fri -> limg ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $fri -> limg -> move('./Admin/link/img/',$name);
            //dump($res);
            $fri -> limg = $name;
        }       
        $fri -> url = $request -> input('url','');
       
        //验证添加
        if ($fri -> save()) {
            return redirect('/admin/links')->with('success','添加成功');
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
        $data = Shop_link::find($id);
        //dump($data);die;
        return view('admin.link.edit',['data'=>$data]);
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
        $data = Shop_link::find($id);
        //$link = new Shop_link;
        $data -> lname = $request->input('lname','');
        $data -> url = $request->input('url','');
       //dump($request -> hasFile('limg'));die;
        if($request -> hasFile('limg')){
            $data -> limg = $request -> file('limg');

            //var_dump($carousel -> img);die;
            $ext = $data -> limg ->getClientOriginalExtension();
            //var_dump($ext);die;
            // 处理文件名称
            $temp_name = str_random(20);

            $name =  $temp_name.'.'.$ext;
            //$dirname = date('Ymd',time());
            $data -> limg -> move('./Admin/link/img/',$name);
            //dump($res);
            $data -> limg = $name;
            dump($data);
        }

          if($data -> save())
        {
            return redirect('admin/links')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $res = Shop_link::find($id)->delete();
        if($res){
            return redirect('/admin/links')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
