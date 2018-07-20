<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_goods;
use App\Models\Goshop;
use App\Models\Shop_cates;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

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
        $good = Shop_goods::find($id);
        // dd($a);
        $goods = Shop_goods::all();
        // dd($good);
        $goshop = Goshop::all();
        $gid = [];
        foreach ($goshop as $k=>$v) 
        {
            $gid[] = $v->gid;
        }
        // dd($gid);
        $num = 0;
        foreach ($gid as $key => $value) {
            $num += 1;
        }
        // dd($num);
        $goshop = Shop_goods::find($gid);
        // dd($goshop);
        return view('home.homecate.detail',['goods'=>$goods,'good'=>$good,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $good = Shop_goods::where('cid',$id)->first();
        // dd($good);
        if($good == null){
            $goshop = Goshop::all();
            $gid = [];
            foreach ($goshop as $k=>$v) 
            {
                $gid[] = $v->gid;
            }
            // dd($gid);
            $num = 0;
            foreach ($gid as $key => $value) {
                $num += 1;
            }
            return view('home.homecate.cgood',['num'=>$num]);
        }else{
            $good = Shop_goods::where('cid',$id)->get();
            $cate = Shop_cates::where('id',$id)->first();
            $goods = Shop_goods::all();
            // dd($good);
            $goshop = Goshop::all();
            $gid = [];
            foreach ($goshop as $k=>$v) 
            {
                $gid[] = $v->gid;
            }
            // dd($gid);
            $num = 0;
            foreach ($gid as $key => $value) {
                $num += 1;
            }
            // dd($num);
            $goshop = Shop_goods::find($gid);
            // dd($goshop);
            return view('home.homecate.cate',['goods'=>$goods,'good'=>$good,'num'=>$num,'cate'=>$cate]);
            }
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
        //
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
