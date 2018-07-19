<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Shop_activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cname = $request->input('cname');
        $shops = Shop_activity::where('title','like','%'.$cname.'%')->paginate(3)->appends($request->input());
        return view('admin.activity.index',['shop'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ac = Shop_activity::all();
        $a = 0; 
        foreach ($ac as $key => $value) {
            $a += 1;
        }
        if ($a == 4) {
            return back()->with('error','抱歉，活动已满,最多只能添加4个哦！');
        }
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $file = $request->file('price');
        $ext = $file ->getClientOriginalExtension();
        $str = str_random(15);
        $time = date('ymd',time());
        $filename = $time.'/'.$str.'.'.$ext;
        $file -> move('./images/activity/'.$time,$filename);
        $activity = new Shop_activity;
        $activity -> title =  $request->input('title','');
        $activity -> day = $request->input('day','');
        $activity -> content =  $request->input('content','');
        $activity -> price = $filename;
        if($activity -> save()) {
            return redirect('/admin/activity')->with('success','添加成功！');
        } else {
            return back()->with('error','添加失败!');
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
        $activity = Shop_activity::find($id);
        // dd($activity->title);
        // dd($id);
        return view('admin.activity.edit',['activity'=>$activity,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $id)
    {
        // dd($request->input('aid'));
         // dd($id)
        $activity = Shop_activity::find($id);
        $file = $request->file('price');
        $ext = $file ->getClientOriginalExtension();
        $str = str_random(15);
        $time = date('ymd',time());
        $filename = $time.'/'.$str.'.'.$ext;
        $file -> move('./images/activity/'.$time,$filename);
        $activity -> title =  $request->input('title','');
        $activity -> day = ($request->input('day',''));
        $activity -> content =  $request->input('content','');
        $activity -> price = $filename;
       //dd($activity->save());
       // $a=$activity->save();
        if($activity->save()) {
            return redirect('/admin/activity')->with('success','修改成功！');
        } else {
            return back()->with('error','修改失败!');
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
        // echo $id;
        $ids = Shop_activity::destroy($id);
        // dd($ids);
        if ($ids != 0) {
            return redirect('/admin/activity')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
