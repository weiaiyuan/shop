<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goshop;
use App\Models\Shop_goods;

class GoshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {   
        // $ids =  $request->input('id');
        // echo $request->input('eat','原味');
        // echo $request->input('pack','裸装');
        // echo $ids;
        $ids = $request->input('id');
        $id = Goshop::where('gid',$ids)->first();
        if($id != null){
            echo 'error';
            exit;
        }
        $goshop = new Goshop;
        // dd($goshop);
        $goshop -> gid = $request->input('id');
        $goshop -> pack = $request->input('pack');
        $goshop -> eat = $request->input('eat');
        $goshop -> num = $request->input('num');
        if($goshop->save()){
            echo 'success';
        }else{
            echo 'error';
        }
       
        // echo 'success';
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
        $arr = $request->input('arr');
        if(Goshop::destroy($arr) != 0) {
            echo 'success';
        }else{
            echo 'error';
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
    public function getShow()
    {
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
        return view('home.homecate.goshop',['goshop'=>$goshop,'num'=>$num]);
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
    public function getDestroy(Request $request,$id)
    {
        $ids = $request->input('id');
        if(Goshop::destroy($ids) != 0) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
