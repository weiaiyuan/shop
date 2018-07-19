<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateInsertRequest;
use App\Models\Shop_cates; 
use DB;

class CateController extends Controller
{
    // public static function getCates(Request $request)
    // {
    //     $name = $request->input('cname');
    //     $cate = Shop_cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->where('cname','like','%'.$request->input('name').'%')->paginate(10);
    //     foreach($cate as $k=>$v) 
    //     {
    //         // 统计，号的次数
    //         $n = substr_count($v->path,',');
    //         $v->cname = str_repeat('|----',$n).$v->cname;
    //     }
    //         return $cate;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $a = $request->input('cname');//dump($a);
        $cate = Shop_cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->where('cname','like','%'.$a.'%')->paginate(5)->appends($request->input());
        foreach($cate as $k=>$v) 
        {
            // 统计，号的次数
            $n = substr_count($v->path,',');
            $v->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.cates.index',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
        $cates = Shop_cates::all();
        foreach($cates as $k=>$v) 
        {
            // 统计，号的次数
            $n = substr_count($v->path,',');
            $v->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.cates.cate',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CateInsertRequest $request)
    {
        // $this->validate($request, [
        // 'cname' => 'required|unique:shop_cates',
        // 'pid' => 'required',
        // ],['cname.required'=>'名称未填写',
        //     //正则限制：'cname.regex'=>'格式不正确',
        //     'cname.unique'=>'名称已存在',
        //     'pid.required'=>'类别未选择',
        // ]);
        //压入数据库
        //数据库
        
        $cates = new Shop_cates;
        $pid = $request->input('pid','');
        if($pid == 0){
            $cates -> path = '0';
        }else{
            $a = Shop_cates::find($pid);
            $cates -> path = $a->path.','.$a->id;
            if (substr_count($a->path,',') == 2) {
            return back()->with('error','并不允许选择超过三级分类');
            }
        }
       
        $cates -> cname = $request->input('cname','');
        $cates -> pid = $request->input('pid','');

        if($cates -> save())
        {
            return redirect('admin/cate')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id)
    {
        //
        $cate = Shop_cates::find($id);
        $cates = Shop_cates::all();
        foreach($cates as $k=>$v) 
        {
            // 统计，号的次数
            $n = substr_count($v->path,',');
            $v->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.cates.edit',['cates'=>$cates,'cate'=>$cate,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request, $id)
    {
      
        $cates = Shop_cates::find($id);
        $pid = $request->input('pid','');
        if($pid == 0){
            $cates -> path = '0';
        }else{
            $a = Shop_cates::find($pid);
            if (substr_count($a->path,',') == 2) {
            return redirect('/admin/cate/')->with('error','并不允许选择超过三级分类');
            }
            $cates -> path = $a->path.','.$a->id;
        }
        $cates -> cname = $request->input('cname','');
        $cates -> pid = $request->input('pid','');

        if($cates -> save())
        {
            return redirect('/admin/cate')->with('success','修改成功');
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
    public function postDestroy($id)
    {
        // echo $id;
        $data = Shop_cates::where('pid','=',$id)->first();
        if (empty($data)) {
            Shop_cates::destroy($id);
            return back()->with('success','删除成功!');
        } else {
            return back()->with('error','当前分类有子分类，不允许删除');
        }
    }
}
