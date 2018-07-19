<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Userdetail;
use App\User;
use App\Models\ShopUsers;
use DB;
use Hash;
use App\Http\Requests\UserPostRequest;
class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //用户添加视图
        //搜索 //分页
        $user = $request->input('user');
        $data = ShopUsers::where('uname', 'like', '%' . $user . '%')->paginate(5);
        return view('admin.user.list', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request) {
        $data = $request->except(['_token']);
        $user = new ShopUsers;
        $user->uname = $data['uname'];
        //哈希加密
        $user->pass = Hash::make($data['pass']);
        $user->qx = $data['qx'];
        $user->sex = $data['sex'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->token = str_random(50);
        //头像
        if ($request->hasFile('tou')) {
            // 使用request 创建文件上传对象
            $profile = $request->file('tou');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name = $temp_name . '.' . $ext;
            $dirname = date('Ymd', time());
            $res = $profile->move('./uploads/' . $dirname, $name);
            $data['tou'] = $res;
            $user->tou = $dirname . '/' . $name;
        }
        if ($user->save()) {
            return redirect('/admin/user')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = ShopUsers::find($id);
        return view('admin.user.edit', ['data' => $data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->except(['_token', '_method']);
        $user = ShopUsers::find($id);
        $user->uname = $data['uname'];
        $user->pass = Hash::make($data['pass']);
        $user->qx = $data['qx'];
        $user->sex = $data['sex'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        if ($request->hasFile('tou')) {
            // 使用request 创建文件上传对象
            $profile = $request->file('tou');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name = $temp_name . '.' . $ext;
            $dirname = date('Ymd', time());
            $res = $profile->move('./uploads/' . $dirname, $name);
            $data['tou'] = $res;
            $user->tou = $dirname . '/' . $name;
        }
        if ($user->save()) {
            return redirect('/admin/user');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $soft = ShopUsers::find($id);
        $soft->delete();
        return redirect('/admin/user');
    }
}


