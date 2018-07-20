<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goshop;
use App\Models\Soucang;
use App\Models\Shop_goods;

class SoucangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $Goshop = Goshop::all();
        $num = 0;
        foreach ($Goshop as $key => $value) {
            $num +=1;
        }
        $soucang = Soucang::all();
        $a = [];
        foreach ($soucang as $key => $value) {
            $a[] = $value->sid;
        }
        $soucang = Shop_goods::find($a);
        // dd($soucang);
        return view('home.homecate.collect',['num'=>$num,'soucang'=>$soucang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
        $id = $request -> input('id');
        $a = Soucang::where('sid',$id)->first();
        if($a != null){
            echo 'error';
        }else{
        $soucang = new Soucang;
        $soucang -> sid = $id;
        // dd('success');
        if ($soucang->save()) {
            echo 'success';
        } else {
            echo 'error';
        }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStore()
    {


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
    public function getDestroy(Request $request, $id)
    {
        $ids = $request->input('id');
        $a = Soucang::where('sid',$ids)->first();
        $k = Soucang::destroy($a->id); 
        if ($k == 1) {
            echo 'success';
        } else  {
            echo 'error';
        }
    }
}
