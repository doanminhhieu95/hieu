<?php

namespace App\Http\Controllers;

use App\kqxs;
use App\daycity;
use App\day;
use App\ketqua;
use Illuminate\Http\Request;
use Auth;

class kqxsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $kqxs = kqxs::all();
                // dd($kqxs->daycity->city->name);
                return view('admin.page.kqxs.ketqua',[
                    'kqxs'=>$kqxs,
                ]);
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
     * @param  \App\kqxs  $kqxs
     * @return \Illuminate\Http\Response
     */
    public function show(kqxs $kqxs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kqxs  $kqxs
     * @return \Illuminate\Http\Response
     */
    public function edit(int $kqxs)
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $kqxs = ketqua::find($kqxs);
                return view('admin.page.kqxs.edit',[
                    'kqxs'=>$kqxs
                    ]);
            }
        }
        else return view('page.trangchu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kqxs  $kqxs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $kqxs)
    {
        //
        $this->validate($request,
            [
                'ketqua'=>'max:6|min:2'
            ],
            [
                'ketqua.max' => 'Nhập sai dữ liệu!',
                'ketqua.min' => 'Nhập sai dữ liệu!'
            ]);
            $kqxsUpdate = ketqua::where('id', $kqxs)
                ->Update([
                    'ketqua' => $request->input('ketqua')
                ]);
            if($kqxsUpdate){
                return redirect('/ketqua')
                ->with('edit','Chỉnh sửa thành công');
            }
            //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
            return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kqxs  $kqxs
     * @return \Illuminate\Http\Response
     */
    public function destroy(kqxs $kqxs)
    {
        //
    }
}
