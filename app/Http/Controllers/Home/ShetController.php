<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ShetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homes()
    {
        $logos = DB::table('shop_shet')->first();
        //dump($data);
        return view('home.layout.index',['logos'=>$logos]);
    }

}
