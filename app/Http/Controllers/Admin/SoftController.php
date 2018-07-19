<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ShopUsers;
class SoftController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function getShow(request $request)
  {
        
        $user = $request -> input('user');
        
         
         $del_data = ShopUsers::onlyTrashed() ->where('uname','like','%'.$user.'%')->paginate(5);
                             
        // dump($del_data);
       
    
    // $del_data = ShopUsers::onlyTrashed()->get();
    return view('admin.user.soft',['del_data'=>$del_data]);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getReset($id)
    {         
        //恢复
            $res =  ShopUsers::withTrashed()->where('id','=',$id) ->restore();
             if ($res) {
                return back ();
             }
   
    }
    public function getDel($id)
    {
      
      
         $res = ShopUsers::onlyTrashed()->find($id);

              $res1 = $res->forceDelete();
            
          if (!$res1) {
                 return back ();
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
    public function getDelete($id)
    {
      
    }
}
