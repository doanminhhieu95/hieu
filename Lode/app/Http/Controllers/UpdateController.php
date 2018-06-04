<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhde;
use App\kqxs;
use App\daycity;
use App\giai;
use App\ketqua;
use App\User;
use App\kieuchoi;
use App\giaikqxs;
use App\kieuchoigiai;
use App\city;

class UpdateController extends Controller
{
    //
    public function postcapnhat(Request $req){
        $d = substr($req->date,0,2);
        $m = substr($req->date,3,2);
        $y = substr($req->date,6,4);
        $date = $y."-".$m."-".$d;
        $ngay = $d."-".$m."-".$y;
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
        $city = city::find($req->city);
        $danhde = danhde::where([
            ['ngaydanh',$date],
            ['jackpot',-1],
            ['idcity',$req->city]
            ])->get();
        if(count($danhde)==0){
            return back()->with([
                'flag'=>'danger',
                'danhde'=>'Không có phiếu ghi đề nào ngày '.$ngay. ' đài '. $city->name
            ]);
        }
        // dd($danhde[0]->idkieuchoi);
        foreach($danhde as $dd){
            $ketqua = array();
            $giaikqxs = array();
            $daycity = daycity::where([
                ['idcity',$dd->idcity],
                ['idday',$thu],
                ])->first();
            $kqxs = kqxs::where([
                ['ngayxoso',$dd->ngaydanh],
                ['iddaycity',$daycity->id]
                ])->first();
            if(count($kqxs)==0){
                return back()->with([
                    'flag'=>'danger',
                    'danhde'=>'Chưa có kết quả để cập nhật'
                ]);
            }
            $kieuchoigiai = kieuchoigiai::where('idkieuchoi',$dd->kieuchoi->id)->get();
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
            $kieuchoi = kieuchoi::find($dd->idkieuchoi);
            if($kieuchoi->loai==2){
                $n=0;
                if($kieuchoi->max == 1){
                    foreach($a as $haiso){
                        if($dd->number == $haiso){
                            $n++;
                        }
                    }
                }
                else{
                    $trungs = array(8,9,10,23,24,25,39,40,41);
                    $truots = array(11,12,13,26,27,28,42,43,44);
                    $number = explode("-",$dd->number);
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
                    if($dd->kieuchoi->id == $d){
                        foreach($a as $motso){
                            if($dd->number == substr($motso,-2,1)){
                                $n++;
                            }
                        }
                        break;
                    }
                }
                foreach($duoi as $d){
                    if($dd->kieuchoi->id == $d){
                        foreach($a as $motso){
                            if($dd->number == substr($motso,-1,1)){
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
                    if($dd->number == $baso){
                        $n++;
                    }
                }
            }
            $dd->Update([
                'jackpot'=>$n
            ]);
            $user = User::where('id',$dd->iduser)->first();
            $user = User::where('id',$dd->iduser)->first()
            ->Update([
                'money'=>$user->money + ($dd->money*$n*$kieuchoi->giaithuong)
            ]);
        }
        return back()->with([
            'flag'=>'success',
            'danhde'=>'Cập nhật thành công ngày '.$ngay
        ]);
        // dd("ok");
    }
}
