<?php

namespace App\Http\Controllers;

use App\giaodich;
use App\User;
use Illuminate\Http\Request;
use Auth;

class giaodichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                if(!isset($req->trangthai)){
                    $giaodich = giaodich::paginate(10,['*'],'giaodich');
                    return view('admin.page.giaodich.index',[
                        'giaodich'=>$giaodich,
                        'type'=>'Tất cả'
                    ]);
                }
                else if($req->trangthai == 0){
                    $giaodich = giaodich::where('trangthai',"Đang chờ")->paginate(10,['*'],'giaodich');
                    return view('admin.page.giaodich.index',[
                        'giaodich'=>$giaodich,
                        'type'=>'Đang chờ'
                    ]);
                }
                else{
                    $giaodich = giaodich::where('trangthai',"Thành công")->paginate(10,['*'],'giaodich');
                    return view('admin.page.giaodich.index',[
                        'giaodich'=>$giaodich,
                        'type'=>'Tất cả'
                    ]);
                }
            }
        }
        else return view('page.trangchu');
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
     * @param  \App\giaodich  $giaodich
     * @return \Illuminate\Http\Response
     */
    public function show(giaodich $giaodich)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\giaodich  $giaodich
     * @return \Illuminate\Http\Response
     */
    public function edit(giaodich $giaodich)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\giaodich  $giaodich
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, giaodich $giaodich)
    {
        //
        if(isset($request->capnhat)){
            $money = $giaodich->moneyGD;
            $user = User::find($giaodich->iduser);
            $moneyuser = $user->money;
            $day = Date("Y-m-d h:i:s");
            if($money>0){
                $giaodich = giaodich::where('id',$giaodich->id)
                ->Update([
                    'ngayGD'=>$day,
                    'tiensauGD'=>$money + $user->money,
                    'trangthai'=>"Thành công"
                ]);
                $user->Update([
                    'money'=> $money + $user->money
                ]);
            }
            else{
                $giaodich = giaodich::where('id',$giaodich->id)
                ->Update([
                    'ngayGD'=>$day,
                    'tiensauGD'=>$user->money,
                    'trangthai'=>"Thành công"
                ]);
            }
            return back()->with('thanhcong','Cập nhật thành công');
        }
        if(isset($request->huybo)){
            $money = $giaodich->moneyGD;
            $user = User::find($giaodich->iduser);
            $moneyuser = $user->money;
            $day = Date("Y-m-d h:i:s");
            if($money>0){
                $giaodich = giaodich::where('id',$giaodich->id)
                ->Update([
                    'ngayGD'=>$day,
                    'tiensauGD'=>$user->money,
                    'trangthai'=>"Thất bại"
                ]);
            }
            else{
                $giaodich = giaodich::where('id',$giaodich->id)
                ->Update([
                    'ngayGD'=>$day,
                    'tiensauGD'=>$user->money - $money,
                    'trangthai'=>"Thất bại"
                ]);
                $user->Update([
                    'money'=>$user->money - $money
                ]);
            }
            return back()->with('thanhcong','Hủy bỏ thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\giaodich  $giaodich
     * @return \Illuminate\Http\Response
     */
    public function destroy(giaodich $giaodich)
    {
        //
    }
}
