<?php

namespace App\Http\Controllers;

use App\danhde;
use Illuminate\Http\Request;
use App\kqxs;
use App\daycity;
use App\giai;
use App\ketqua;
use App\User;
use App\kieuchoi;
use App\giaikqxs;
use App\kieuchoigiai;
use Auth;

class danhdeController extends Controller
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
                return view('admin.page.danhde.index');
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
     * @param  \App\danhde  $danhde
     * @return \Illuminate\Http\Response
     */
    public function show(danhde $danhde)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\danhde  $danhde
     * @return \Illuminate\Http\Response
     */
    public function edit(danhde $danhde)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\danhde  $danhde
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, danhde $danhde)
    {
        //
        if(isset($request->capnhat)){
        // $d = substr($req->date,0,2);
        // $m = substr($req->date,3,2);
        // $y = substr($req->date,6,4);
        // $date = $y."-".$m."-".$d;
        $date = $danhde->ngaydanh;
        $thu = date('l', strtotime($date));
        if($thu=="Sunday") $thu = 1;
        if($thu=="Monday") $thu = 2;
        if($thu=="Tuesday") $thu = 3;
        if($thu=="Wednesday") $thu = 4;
        if($thu=="Thursday") $thu = 5;
        if($thu=="Friday") $thu = 6;
        if($thu=="Saturday") $thu = 7;
        // $kiemtra = kqxs::where('ngayxoso',$date)->get();
        // if(count($kiemtra)==0){
        //     return back()->with('err','Chưa có kết quả để cập nhật!');
        //  }
        // $danhde = danhde::where([
        //     ['ngaydanh',$date],
        //     ['jackpot',-1],
        //     ])->get();
        // dd($danhde[0]->idkieuchoi);
        $ketqua = array();
        $giaikqxs = array();
        
        $daycity = daycity::where([
            ['idcity',$danhde->idcity],
            ['idday',$thu],
            ])->first();
        $kqxs = kqxs::where([
            ['ngayxoso',$danhde->ngaydanh],
            ['iddaycity',$daycity->id]
            ])->first();
        if(count($kqxs)==0){
        return back()->with('err','Chưa có kết quả để cập nhật!');
        }
        $kieuchoigiai = kieuchoigiai::where('idkieuchoi',$danhde->kieuchoi->id)->get();
        foreach($kieuchoigiai as $kcg){
            $giaikqxs[] = giaikqxs::where([
                ['idkqxs',$kqxs->id],
                ['idgiai',$kcg->idgiai]
                ])->first();
        }
        // dd($giaikqxs);
        foreach($giaikqxs as $ketquaxoso){
            $ketqua[] = ketqua::where('idgiaikqxs',$ketquaxoso->id)->get();
        }
        $a = array();
        $b = array();
        foreach($ketqua as $kq){
            for($i=0;$i<count($kq);$i++){
                $a[] = substr($kq[$i]->ketqua,-2);
                $b[] = substr($kq[$i]->ketqua,-3);
            }
        }
        // dd($kieuchoigiai);
        $kieuchoi = kieuchoi::find($danhde->idkieuchoi);
        if($kieuchoi->loai==2){
            $n=0;
            if($kieuchoi->max == 1){
                foreach($a as $haiso){
                    if($danhde->number == $haiso){
                        $n++;
                    }
                }
            }
            else{
                $trungs = array(8,9,10,23,24,25,39,40,41);
                $truots = array(11,12,13,26,27,28,42,43,44);
                $number = explode("-",$danhde->number);
                foreach($trungs as $trung){
                    if($kieuchoi->id == $trung){
                        $i=0;
                        foreach($number as $num){
                            foreach($a as $haiso){
                                if($num == $haiso){
                                    $i++;
                                    break;
                                }
                            }
                        }
                        if($i==count($number)){
                            $n++;
                        }
                        break;
                    }
                }
                foreach($truots as $truot){
                    if($kieuchoi->id == $truot){
                        $j=0;
                        foreach($number as $num){
                            foreach($a as $haiso){
                                if($num == $haiso){
                                    $j++;
                                    break;
                                }
                            }
                        }
                        if($j==0){
                            $n++;
                        }
                        break;
                    }
                }
            }
        }
        else if($kieuchoi->loai==1){
            // dd("pl");
            $n=0;
            $dau = array(6,21,37);
            $duoi = array(7,22,38);
            foreach($dau as $d){
                if($danhde->kieuchoi->id == $d){
                    foreach($a as $motso){
                        if($danhde->number == substr($motso,-2,1)){
                            $n++;
                        }
                    }
                    break;
                }
            }
            foreach($duoi as $d){
                if($danhde->kieuchoi->id == $d){
                    foreach($a as $motso){
                        if($danhde->number == substr($motso,-1,1)){
                            $n++;
                        }
                    }
                    break;
                }
            }
        }
        else if($kieuchoi->loai==3){
            // dd($b);
            $n=0;
            foreach($b as $baso){
                if($danhde->number == $baso){
                    $n++;
                }
            }
        }
        $danhde->Update([
            'jackpot'=>$n
        ]);
        $user = User::where('id',$danhde->iduser)->first();
        $user = User::where('id',$danhde->iduser)->first()
        ->Update([
            'money'=>$user->money + ($danhde->money*$n*$kieuchoi->giaithuong)
        ]);
        return back()->with([
            'danhde'=>'cập nhật thành công',
            'flag'=>'success'
            ]);
        }
        if(isset($request->hoantac)){
            $kieuchoi = kieuchoi::find($danhde->id);
            $userUpdate = User::where('id', $danhde->iduser)
            ->Update([
                'money'=>$danhde->user->money + $danhde->money*$danhde->kieuchoi->money
            ]);
            $finddanhde = danhde::find($danhde->id);
            $finddanhde->delete();
            if($userUpdate){
                return redirect()
                ->route('danhde.index')
                ->with([
                    'danhde'=>'Hoàn tác thành công',
                    'flag'=>'success'
                    ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\danhde  $danhde
     * @return \Illuminate\Http\Response
     */
    public function destroy(danhde $danhde)
    {
        //
    }
}
