<?php

namespace App\Http\Controllers;

use App\nganhang;
use Illuminate\Http\Request;
use App\ruttien;
use App\giaodich;
use Auth;

class nganhangController extends Controller
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
                $nganhang = nganhang::paginate(15,['*'],'nganhang');
                return view('admin.page.nganhang.index',['nganhang'=>$nganhang]);
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
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                return view('admin.page.nganhang.create');
            }
        }
        else return view('page.trangchu');
        
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
        $this->validate($request,
        [
            'name' => 'unique:nganhang,name'
        ],
        [
            'name.unique' => 'Ngân hàng này đã có rồi!',
        ]);
        $nganhang = new nganhang();
        $nganhang->name = $request->input('name');
        $nganhang->save();
        
        return redirect()->route('nganhang.index')
        ->with('thanhcong','Thêm ngân hàng mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nganhang  $nganhang
     * @return \Illuminate\Http\Response
     */
    public function show(nganhang $nganhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nganhang  $nganhang
     * @return \Illuminate\Http\Response
     */
    public function edit(nganhang $nganhang)
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $nganhang = nganhang::find($nganhang->id);
                return view('admin.page.nganhang.edit',['nganhang'=>$nganhang]);
            }
        }
        else return view('page.trangchu');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nganhang  $nganhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nganhang $nganhang)
    {
        //
        $this->validate($request,
        [
            'name' => 'unique:nganhang,name'
        ],
        [
            'name.unique' => 'Ngân hàng này đã có rồi!',
        ]);
        $nganhangUpdate = nganhang::where('id', $nganhang->id)
            ->Update([
                'name' => $request->input('name')
            ]);
        if($nganhangUpdate){
            return redirect()
            ->route('nganhang.index')
            ->with('edit','Chỉnh sửa thành công');
        }
        //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nganhang  $nganhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(nganhang $nganhang)
    {
        //
    }
    public function deleteItem(Request $req){
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                ruttien::where('idbank',$req->id)->delete();
                giaodich::where('idbank',$req->id)->delete();
                nganhang::find($req->id)->delete();
                return response()->json();
            }
        }
        else return view('page.trangchu');
    }
}
