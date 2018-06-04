<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\daycity;
use App\city;
use App\giaikqxs;
use App\kqxs;
use App\ketqua;
use Auth;

class ketquaController extends Controller
{
    //
    public function getketqua(){
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                return view('admin.page.kqxs.index');
            }
        }
        else return view('page.trangchu');
        
    }
    public function postketqua(Request $req){
        if(strlen($req->giai_1)!=5 && strlen($req->giai_1)!=6){
            return redirect()->back()->with([
                'flag'=>'danger',
                'update'=>'Chưa có kết quả để cập nhật'
            ]);
        }
        $d = substr($req->date,0,2);
        $m = substr($req->date,3,2);
        $y = substr($req->date,6,4);
        $date = $y."-".$m."-".$d;
        $thu = date('l', strtotime($date));
        if($thu=="Sunday") $thu = 1;
        if($thu=="Monday") $thu = 2;
        if($thu=="Tuesday") $thu = 3;
        if($thu=="Wednesday") $thu = 4;
        if($thu=="Thursday") $thu = 5;
        if($thu=="Friday") $thu = 6;
        if($thu=="Saturday") $thu = 7;
        $daycity = daycity::where([
            ['idcity',$req->city],
            ['idday',$thu]
        ])->first();
        $kqxs = kqxs::where([
            ['ngayxoso',$date],
            ['iddaycity',$daycity->id]
        ])->get();
        if(count($kqxs)!=0){
            return redirect()->back()->with([
                'flag'=>'danger',
                'update'=>'Đài này đã cập nhật rồi!'
            ]);
        }
        $kqxs = new kqxs();
        $kqxs->ngayxoso = $date;
        $kqxs->iddaycity = $daycity->id;
        $kqxs->save();
        if($req->city == 1){
            $n = 9;
        }else $n = 10;
        for($i=1; $i<$n; $i++){
            $giaikqxs = new giaikqxs();
            $giaikqxs->idkqxs = $kqxs->id;
            $giaikqxs->idgiai = $i;
            $giaikqxs->save();
            
            $kq = "giai_".$i;
            $giai = $req->$kq;
            $array = explode(" - ",$giai);
            if(count($array)==1){
                $array[0] = $req->$kq;
            }
            foreach($array as $key=>$value){
                $ketqua = new ketqua();
                $ketqua->ketqua = $value;
                $ketqua->idgiaikqxs = $giaikqxs->id;
                $ketqua->save();
            }
        }
        return redirect()->back()->with([
            'flag'=>'success',
            'update'=>'Cập nhật thành công!'
        ]);
    }
}
