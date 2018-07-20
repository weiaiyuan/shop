<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Shop_activity;
use App\Models\Shop_cates;
use App\Models\Shop_pushs;
use App\Models\Shop_goods;
use App\Models\Goshop;
use App\Http\Controllers\Home\HomeActivityController;
use DB;
class HomeActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  static function cate($pid)
    {
        $cates = Shop_cates::where('pid',$pid)->get();
        foreach ($cates as $k => $v)
        {
            $v['sub'] = self::cate($v->id);
        }
        return $cates;
    }
    public function index()
    {
        $cates = self::cate(0);
        // dd($cates);
        // $cates = Shop_cates::all();
        $n = [];
        foreach ($cates as $k=>$v) //一级分类
        {
            if (substr_count($v->path,',')==0) {
                $n[] = $v->id;
            }
        }
        $z = [];
        foreach ($cates as $k=>$v) //二级分类
        {
            if (substr_count($v->path,',')==1) {
                $z[] = $v->id;
            }
        }
        $a = [];
        foreach ($cates as $k=>$v) //三级分类
        {
            if (substr_count($v->path,',')==2) {
                $a[] = $v->id;
            }
        }
        // dd($n);
        // dd(Shop_cates::find($n));
        $cate = Shop_cates::find($n);
        // $cates = Shop_cates::find($z);
        $catess = Shop_cates::find($a);
        // $goods = Shop_goods::all();
        $activity = Shop_activity::all();//获取所有活动遍历
        $push = Shop_pushs::all(); //获取所有推荐位
        $goods = Shop_goods::all();//获取所有商品
        $arr = []; 
        foreach ($goods as $k=>$v) //遍历所有商品
        {
            foreach ($push as $key => $value) { //遍历商品里面的推荐位 1-1关系
                if ($v->id == $value->uid) { //如果商品id等于推荐表的uid
                    $arr[]=$v -> id;    //则压入数组
                }
            }
        }
        $good  = Shop_goods::find($arr); //商品查找所有与推荐表有关联的商品
        $goshop = Goshop::all(); ///获取所有购物车内的商品
        $gid = [];
        foreach ($goshop as $k=>$v) //遍历所有购物车里的商品
        {
            $gid[] = $v->gid; //压入商品id
        }
        // dd($gid);
        $num = 0;
        foreach ($gid as $key => $value) { //遍历有多少次商品id
            $num += 1; //计算总数，遍历到view视图中
        }
        // dd($num);
        $goshop = Shop_goods::find($gid); //查找商品里在购物车里的
        // dd($goshop);
        $data = DB::table('shop_sowing')->get();
        // dd($good);
        // dd($activity);
        return view('home.layout.qiantai',['cates'=>$cates,'cate'=>$cate,'catess'=>$catess,'activity'=>$activity,'push'=>$push,'good'=>$good,'goods'=>$goods,'num'=>$num,'data'=>$data]);
        // return view('home.layout.index',['activity'=>$activity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
