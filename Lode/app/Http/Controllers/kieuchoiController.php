<?php

namespace App\Http\Controllers;

use App\kieuchoi;
use Illuminate\Http\Request;
use App\area;
use App\loaide;
use App\danhde;
use App\kieuchoigiai;
use Auth;

class kieuchoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                if(!isset($req->area)){
                    $kieuchoi = kieuchoi::all();
                    return view('admin.page.kieuchoi.index',[
                        'kieuchoi'=>$kieuchoi,
                        'type'=>'Tất cả'
                    ]);
                }
                else{
                    $kieuchoi = kieuchoi::where('idarea',$req->area)->get();
                    return view('admin.page.kieuchoi.index',[
                        'kieuchoi'=>$kieuchoi,
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
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $area = area::all();
                return view('admin.page.kieuchoi.create',[
                    'area'=>$area
                ]);
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
            'giaithuong'=>'integer|min:1',
            'money'=>'integer|min:1',
            'loai'=>'integer|min:1',
            'max'=>'integer|min:1'
        ],
        [
            'giaithuong.integer' => 'Tiền trúng phải là số nguyên lớn hơn 0!',
            'money.integer' => 'Tiền chơi phải là số nguyên lớn hơn 0!',
            'loai.integer' => 'Loại phải là số nguyên lớn hơn 0!',
            'max.integer' => 'Số chơi phải là số nguyên lớn hơn 0!',
            'giaithuong.min' => 'Tiền trúng phải là số nguyên lớn hơn 0!',
            'money.min' => 'Tiền chơi phải là số nguyên lớn hơn 0!',
            'loai.min' => 'Loại phải là số nguyên lớn hơn 0!',
            'max.min' => 'Số chơi phải là số nguyên lớn hơn 0!',
        ]);
        $kieuchoi = new kieuchoi();
        $kieuchoi->name = $request->name;
        $kieuchoi->giaithuong = $request->giaithuong;
        $kieuchoi->money = $request->money;
        $kieuchoi->luatchoi = $request->luatchoi;
        $kieuchoi->loai = $request->loai;
        $kieuchoi->max = $request->max;
        $kieuchoi->idloaide = $request->idloaide;
        $kieuchoi->idarea = $request->idarea;
        $kieuchoi->save();
        
        return redirect()->route('kieuchoi.index')
        ->with('thanhcong','Thêm Kiểu chơi mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kieuchoi  $kieuchoi
     * @return \Illuminate\Http\Response
     */
    public function show(kieuchoi $kieuchoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kieuchoi  $kieuchoi
     * @return \Illuminate\Http\Response
     */
    public function edit(kieuchoi $kieuchoi)
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $kieuchoi = kieuchoi::find($kieuchoi->id);
                $loaide = loaide::all();
                $area = area::all();
                return view('admin.page.kieuchoi.edit',[
                    'kieuchoi'=>$kieuchoi,
                    'loaide'=>$loaide,
                    'area'=>$area
                    ]);
            }
        }
        else return view('page.trangchu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kieuchoi  $kieuchoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kieuchoi $kieuchoi)
    {
        //
        if(isset($request->edit)){
            $this->validate($request,
            [
                'giaithuong'=>'integer|min:1',
                'money'=>'integer|min:1',
                'loai'=>'integer|min:1',
                'max'=>'integer|min:1'
            ],
            [
                'giaithuong.integer' => 'Tiền trúng phải là số nguyên lớn hơn 0!',
                'money.integer' => 'Tiền chơi phải là số nguyên lớn hơn 0!',
                'loai.integer' => 'Loại phải là số nguyên lớn hơn 0!',
                'max.integer' => 'Số chơi phải là số nguyên lớn hơn 0!',
                'giaithuong.min' => 'Tiền trúng phải là số nguyên lớn hơn 0!',
                'money.min' => 'Tiền chơi phải là số nguyên lớn hơn 0!',
                'loai.min' => 'Loại phải là số nguyên lớn hơn 0!',
                'max.min' => 'Số chơi phải là số nguyên lớn hơn 0!',
            ]);
            $kieuchoiUpdate = kieuchoi::where('id', $kieuchoi->id)
                ->Update([
                    'name' => $request->input('name'),
                    'giaithuong'=>$request->input('giaithuong'),
                    'money' => $request->input('money'),
                    'luatchoi'=>$request->input('luatchoi'),
                    'loai'=>$request->input('loai'),
                    'max'=>$request->input('max'),
                    'idloaide'=>$request->input('idloaide'),
                    'idarea'=>$request->input('idarea')
                ]);
            if($kieuchoiUpdate){
                return redirect()
                ->route('kieuchoi.index')
                ->with('edit','Chỉnh sửa thành công');
            }
            //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
            return back()->withInput();
        }
        
        if(isset($request->delete)){
            $danhde = danhde::where('idkieuchoi',$kieuchoi->id)->delete();
            $kieuchoigiai = kieuchoigiai::where('idkieuchoi',$kieuchoi->id)->delete();
            $kieuchoi = kieuchoi::find($kieuchoi->id);
            if($kieuchoi->delete()){
                return redirect()->route('kieuchoi.index')
                 ->with([
                     'delete'=>'Xóa kiểu chơi thành công',
                     'flag'=>'success'
                     ]);
            }
            else return redirect()->route('kieuchoi.index')
            ->with([
                'delete'=>'Xóa không thành công!',
                'flag'=>'danger'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kieuchoi  $kieuchoi
     * @return \Illuminate\Http\Response
     */
    public function destroy(kieuchoi $kieuchoi)
    {
        //
    }
}
