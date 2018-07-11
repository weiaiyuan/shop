<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ZhuceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function getIndex()
    {
       return view('home.zhuce.index');
    }

    public function postInsert(Request $request)
    {
        dump($request -> all()); 
    }
}
