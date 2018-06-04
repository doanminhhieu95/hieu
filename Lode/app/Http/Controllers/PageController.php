<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\area;
use App\loaide;
use App\kieuchoi;
use App\city;
use App\daycity;
use App\danhde;
use App\giaodich;
use App\nganhang;
use App\ruttien;

class PageController extends Controller
{
    //
    public function getIndex(){
        return view('page.trangchu');
    }
    public function getmienbac(){
        $loaide = loaide::where('idarea',1)->get();
        return view('page.mienbac',[
            'loaide'=>$loaide
        ]);
    }
    public function getmiennam(){
        $loaide = loaide::where('idarea',3)->get();
        $kieuchoi = kieuchoi::where([
            ['idarea',3]
        ])->first();
        return view('page.miennam',[
            'loaide'=>$loaide,
            'kieuchoi'=>$kieuchoi
        ]);
    }
    public function getmientrung(){
        $loaide = loaide::where('idarea',2)->get();
        return view('page.mientrung',[
            'loaide'=>$loaide
        ]);
    }
    public function getmember(){
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $danhde = danhde::where('iduser',$user->id)->paginate(10,['*'],'danhde');
            $nganhang = nganhang::all();
            $giaodich = giaodich::where('iduser',$user->id)->orderBy('ngayGD')->paginate(10,['*'],'giaodich');
            return view('page.member',[
                'danhde'=>$danhde,
                'user'=>$user,
                'nganhang'=>$nganhang,
                'giaodich'=>$giaodich
            ]);
        }
        else return view('page.trangchu');
    }
    public function getadmin(){
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else return view('admin.page.kqxs.ketqua');
        }
        else return view('page.trangchu');
    }
    public function postDangNhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]
            );
            $credentials = array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($credentials)){
                //return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
                if(Auth::user()->level == 0){
                    return view('page.trangchu');
                }
                else return view('admin.page.index');
                
            }
            // else return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu không đúng!']);
    }
    public function getDangKy(){
        return view('page.dangky');
    }
    public function postDangKy(Request $req){
        $this->validate($req,
            [
                'emaildk'=>'email|unique:users,email',
                'passworddk'=>'min:6|max:20',
                'repassword'=>'same:passworddk',
                'phone'=>'min:10|max:12'
            ],
            [
                'emaildk.email' => 'Không đúng định dạng email',
                'emaildk.unique' => 'Email đã có người sử dụng',
                'passworddk.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'passworddk.max' => 'Mật khẩu tối đa 20 ký tự',
                'repassword.same' => 'Mật khẩu không giống nhau',
                'phone.min' => 'Nhập chưa đúng số điện thoại.',
                'phone.max' => 'Nhập chưa đúng số điện thoại.'
            ]);
            
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->emaildk;
            $user->password = Hash::make($req->passworddk);
            $user->phone = $req->phone;
            $user->money = 0;
            $user->level = 0;
            $user->save();
            return redirect()->route('dangky')->with('dangky','Tạo tài khoản thành công!');
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
    public function postmiennam(Request $req){
        $hetgio = "16:00:00";
        $today = date("Y-m-d");
        $now = date("H:i:s");
        if($req->number==""){
            return redirect()->back()->with('loidanhde','Bạn chưa chọn số. Vui lòng xem lại!'); 
        }
        $number = explode("-",$req->number);
        $this->validate($req,
        [
            'money'=>'integer|min:1',
            'date'=>'required',
            'city'=>'required'
        ],
        [
            'money.integer'=>'Vui lòng xem lại số tiền nhập!',
            'money.min'=>'Số tiền đánh phải lớn hơn 0',
            'date.required'=>'Bạn chưa chọn ngày!',
            'city.required'=>'Bạn chưa chọn đài!'
        ]);
        $kieuchoi = kieuchoi::find($req->kieuchoi);
        if(count($number) != $kieuchoi->max){
            return redirect()->back()->with('loidanhde','Có vẽ như bạn đã chọn sai kiểu chơi hoặc chọn chưa đủ số. Vui lòng xem lại!');
        }
        $d = substr($req->date,0,2);
        $m = substr($req->date,3,2);
        $y = substr($req->date,6,4);
        $date = $y."-".$m."-".$d;
        if($date < $today){
            dd($today);
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        else if($date == $today && $now > $hetgio){
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        $user = User::find(Auth::user()->id);
        if($user->money>=$req->money*$kieuchoi->money){
            $danhde = new danhde();
            $danhde->iduser = Auth::user()->id;
            $danhde->ngaydanh = $date;
            $danhde->number = $req->number;
            $danhde->money = $req->money;
            $danhde->jackpot = "-1";
            $danhde->idcity = $req->city;
            $danhde->idkieuchoi = $req->kieuchoi;
            $danhde->save();
            $user->Update([
                'money'=> $user->money - $req->money*$kieuchoi->money
            ]);
            return redirect()->back()->with([
                'flag'=>'success',
                'danhde'=>'Đánh đề thành công. Chúc bạn may mắn!'
                ]);
        }
        return redirect()->back()->with([
            'flag'=>'danger',
            'danhde'=>'Số tiền còn lại không đủ, vui lòng nạp thêm tiền để chơi!'
            ]);
    }
    public function postmientrung(Request $req){
        $hetgio = "16:00:00";
        $today = date("Y-m-d");
        $now = date("H:i:s");
        if($req->number==""){
            return redirect()->back()->with('loidanhde','Bạn chưa chọn số. Vui lòng xem lại!'); 
        }
        $number = explode("-",$req->number);
        $this->validate($req,
        [
            'money'=>'integer|min:1',
            'date'=>'required',
            'city'=>'required'
        ],
        [
            'money.integer'=>'Vui lòng xem lại số tiền nhập!',
            'money.min'=>'Số tiền đánh phải lớn hơn 0',
            'date.required'=>'Bạn chưa chọn ngày!',
            'city.required'=>'Bạn chưa chọn đài!'
        ]);
        $kieuchoi = kieuchoi::find($req->kieuchoi);
        if(count($number) != $kieuchoi->max){
            return redirect()->back()->with('loidanhde','Có vẽ như bạn đã chọn sai kiểu chơi hoặc chọn chưa đủ số. Vui lòng xem lại!');
        }
        $d = substr($req->date,0,2);
        $m = substr($req->date,3,2);
        $y = substr($req->date,6,4);
        $date = $y."-".$m."-".$d;
        if($date < $today){
            dd($today);
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        else if($date == $today && $now > $hetgio){
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        $user = User::find(Auth::user()->id);
        if($user->money>=$req->money*$kieuchoi->money){
            $danhde = new danhde();
            $danhde->iduser = Auth::user()->id;
            $danhde->ngaydanh = $date;
            $danhde->number = $req->number;
            $danhde->money = $req->money;
            $danhde->jackpot = "-1";
            $danhde->idcity = $req->city;
            $danhde->idkieuchoi = $req->kieuchoi;
            $danhde->save();
            $user->Update([
                'money'=> $user->money - $req->money*$kieuchoi->money
            ]);
            return redirect()->back()->with([
                'flag'=>'success',
                'danhde'=>'Đánh đề thành công. Chúc bạn may mắn!'
                ]);
        }
        return redirect()->back()->with([
            'flag'=>'danger',
            'danhde'=>'Số tiền còn lại không đủ, vui lòng nạp thêm tiền để chơi!'
            ]);
    }
    public function postmienbac(Request $req){
        $hetgio = "16:00:00";
        $today = date("Y-m-d");
        $now = date("H:i:s");
        if($req->number==""){
            return redirect()->back()->with('loidanhde','Bạn chưa chọn số. Vui lòng xem lại!'); 
        }
        $number = explode("-",$req->number);
        $this->validate($req,
        [
            'money'=>'integer|min:1',
            'date'=>'required',
            'city'=>'required'
        ],
        [
            'money.integer'=>'Vui lòng xem lại số tiền nhập!',
            'money.min'=>'Số tiền đánh phải lớn hơn 0',
            'date.required'=>'Bạn chưa chọn ngày!',
            'city.required'=>'Bạn chưa chọn đài!'
        ]);
        $kieuchoi = kieuchoi::find($req->kieuchoi);
        if(count($number) != $kieuchoi->max){
            return redirect()->back()->with('loidanhde','Có vẽ như bạn đã chọn sai kiểu chơi hoặc chọn chưa đủ số. Vui lòng xem lại!');
        }
        $d = substr($req->date,0,2);
        $m = substr($req->date,3,2);
        $y = substr($req->date,6,4);
        $date = $y."-".$m."-".$d;
        if($date < $today){
            dd($today);
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        else if($date == $today && $now > $hetgio){
            return redirect()->back()->with('loidanhde','Đã hết giờ đánh, vui lòng chọn ngày khác!');
        }
        $user = User::find(Auth::user()->id);
        if($user->money>=$req->money*$kieuchoi->money){
            $danhde = new danhde();
            $danhde->iduser = Auth::user()->id;
            $danhde->ngaydanh = $date;
            $danhde->number = $req->number;
            $danhde->money = $req->money;
            $danhde->jackpot = "-1";
            $danhde->idcity = $req->city;
            $danhde->idkieuchoi = $req->kieuchoi;
            $danhde->save();
            $user->Update([
                'money'=> $user->money - $req->money*$kieuchoi->money
            ]);
            return redirect()->back()->with([
                'flag'=>'success',
                'danhde'=>'Đánh đề thành công. Chúc bạn may mắn!'
                ]);
        }
        return redirect()->back()->with([
            'flag'=>'danger',
            'danhde'=>'Số tiền còn lại không đủ, vui lòng nạp thêm tiền để chơi!'
            ]);
    }
    public function postgiaodich(Request $req){
        $this->validate($req,
        [
            'amount'=>'integer|min:1'
        ],
        [
            'amount.integer'=>'Vui lòng xem lại số tiền nhập',
            'amount.min'=>'Số tiền gửi phải lớn hơn 1K'
        ]);
        
        if($req->code == substr(Auth::user()->phone,-5)){
            $giaodich = new giaodich();
            $giaodich->iduser = Auth::user()->id;
            $giaodich->tennguoigui = $req->sender;
            $giaodich->idbank = $req->bank;
            $giaodich->moneyGD = $req->amount;
            $giaodich->tiensauGD = Auth::user()->money + $req->amount;
            $giaodich->trangthai = "Đang chờ";
            $giaodich->save();
            return redirect()->back()->with([
                'giaodich'=>'Gửi yêu cầu thành công! Tiền sẽ chuyển vào tài khoản của bạn trong vòng 24h',
                'flag'=>'success'
                ]);
        }
        return redirect()->back()->with([
            'giaodich'=>'Mã giao dịch không chính xác, vui lòng xem lại!',
            'flag'=>'danger'
            ]);
    }
    public function postruttien(Request $req){
        $this->validate($req,
        [
            'money'=>'integer|min:1'
        ],
        [
            'money.integer'=>'Vui lòng xem lại số tiền nhập',
            'money.min'=>'Số tiền gửi phải lớn hơn 1K'
        ]);
        if($req->code == substr(Auth::user()->phone,-5)){
            $user = User::find(Auth::user()->id);
            $a = $user->money;
            if($user->money<$req->money){
                return redirect()->back()->with([
                    'flag'=>'danger',
                    'ruttien'=>'Tài khoản của bạn không đủ để thực hiện rút tiền!'
                ]);
            }
            else{
                $ruttien = new ruttien();
                $ruttien->iduser = Auth::user()->id;
                $ruttien->idbank = $req->bank;
                $ruttien->stk = $req->stk;
                $ruttien->account = $req->account;
                $ruttien->money = $req->money;
                $ruttien->save();
                $user = User::where('id',Auth::user()->id)
                ->Update([
                    'money'=>$user->money-$req->money
                ]);
                $giaodich = new giaodich();
                $giaodich->iduser=Auth::user()->id;
                $giaodich->tennguoigui=$req->account;
                $giaodich->idbank=$req->bank;
                $giaodich->moneyGD=-$req->money;
                $giaodich->tiensauGD=$a - $req->money;
                $giaodich->trangthai="Đang chờ";
                $giaodich->save();
                return redirect()->back()->with([
                    'flag'=>'success',
                    'ruttien'=>'Rút tiền thành công!'
                ]);
            } 
        }
        else{
            return redirect()->back()->with([
                'flag'=>'danger',
                'giaodich'=>'Mã giao dịch không chính xác, vui lòng xem lại!'
            ]);
        }
    }
    public function getresetpassword(){
        return view('page.resetpassword');
    }
    public function postresetpassword(Request $req){
        $this->validate($req,
            [
                'password'=>'min:6|max:20',
                'password_repeate'=>'same:password'
            ],
            [
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu tối đa 20 ký tự',
                'password_repeate.same' => 'Mật khẩu không giống nhau'
            ]);
        if($req->password == $req->password_repeate){
            $user = User::where('id',Auth::user()->id)
            ->Update([
                'password'=>hash::make($req->password)
            ]);
            return back()->with([
                'reset'=>'Đổi mật khẩu thành công!',
                'flag'=>'success'
            ]);
        }
    }
    public function getgioithieu(){
        return view('page.introduce');
    }
    public function gettrachnhiem(){
        return view('page.trachnhiem');
    }
    public function gethddanhde(){
        return view('page.hddanhde');
    }
    public function getnaptienthucong(){
        return view('page.naptienthucong');
    }
    public function getcachruttien(){
        return view('page.cachruttien');
    }
    public function getforgot(){
        return view('page.quenmatkhau');
    }
    public function getkinhnghiem(){
        return view('page.kinhnghiem');
    }
    public function getkinhnghiem1(){
        return view('page.kinhnghiem1');
    }
    public function getkinhnghiem2(){
        return view('page.kinhnghiem2');
    }
    public function getkinhnghiem3(){
        return view('page.kinhnghiem3');
    }
    public function getkinhnghiem4(){
        return view('page.kinhnghiem4');
    }
}
