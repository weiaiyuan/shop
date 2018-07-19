<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_cates;
use App\Models\Shop_goods;
use App\Models\Shop_shet;
use DB;
class HomeCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Shop_cates::all();
        $n = [];
        foreach ($cates as $k=>$v)
        {
            if (substr_count($v->path,',')==0) {
                $n[] = $v->id;
            }
        }
        $z = [];
        foreach ($cates as $k=>$v)
        {
            if (substr_count($v->path,',')==1) {
                $z[] = $v->id;
            }
        }
        $a = [];
        foreach ($cates as $k=>$v)
        {
            if (substr_count($v->path,',')==2) {
                $a[] = $v->id;
            }
        }
        // dd($n);
        // dd(Shop_cates::find($n));
        $cate = Shop_cates::find($n);
        $cates = Shop_cates::find($z);
        $catess = Shop_cates::find($a);
        // $goods = Shop_goods::all();

        $logos = DB::table('shop_shet')->first();
        $data = DB::table('shop_sowing')->get();
        // dump($logos);
        // exit;
        return view('home.layout.index',['cates'=>$cates,'cate'=>$cate,'catess'=>$catess,'logos'=>$logos,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        //
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
