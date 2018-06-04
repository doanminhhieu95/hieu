<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use App\ruttien;
use App\giaodich;
use App\danhde;
use Auth;

class UserController extends Controller
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
                if(!isset($req->admin)){
                    $users = User::paginate(15,['*'],'user');
                    return view('admin.page.user.index',[
                        'users'=>$users,
                        'type'=>'Tất cả'
                        ]);
                }else if($req->admin==0){
                    $users = User::where('level',0)->paginate(15,['*'],'user');
                    return view('admin.page.user.index',[
                        'users'=>$users,
                        'type'=>'Người dùng'
                        ]);
                }
                else{
                    $users = User::where('level',1)->paginate(15,['*'],'user');
                    return view('admin.page.user.index',[
                        'users'=>$users,
                        'type'=>'Admin'
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
                return view('admin.page.user.create');
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
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                if($request->level=="on"){
                    $level = 1;
                }
                else $level=0;
                $this->validate($request,
                [
                    'email' => 'unique:users,email',
                    'password'=>'min:6|max:20',
                    'repassword'=>'same:password',
                    'phone'=>'min:10|max:12'
                ],
                [
                    'email.unique' => 'email đã có người sử dụng!',
                    'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
                    'password.max' => 'Mật khẩu tối đa 20 ký tự.',
                    'repassword.same' => 'Mật khẩu không giống nhau.',
                    'phone.min' => 'Nhập chưa đúng số điện thoại.',
                    'phone.max' => 'Nhập chưa đúng số điện thoại.'
                ]);
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->phone = $request->input('phone');
                $user->money = 0;
                $user->level = $level;
                $user->save();
                
                return redirect()->route('user.index')
                ->with('thanhcong','Tạo user thành công!');
            }
        }
        else return view('page.trangchu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $user = User::find($user->id);
            return view('admin.page.user.edit',['user'=>$user]);
            }
        }
        else return view('page.trangchu');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                if($request->level=="on"){
                    $level = 1;
                }
                else $level=0;
                $this->validate($request,
                [
                    'password'=>'min:6|max:20',
                    'repassword'=>'same:password',
                    'phone'=>'min:10|max:12'
                ],
                [
                    'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                    'password.max' => 'Mật khẩu tối đa 20 ký tự',
                    'repassword.same' => 'Mật khẩu không giống nhau',
                    'phone.min' => 'Nhập chưa đúng số điện thoại.',
                    'phone.max' => 'Nhập chưa đúng số điện thoại.'
                ]);
                $userUpdate = User::where('id', $user->id)
                    ->Update([
                        'name' => $request->input('name'),
                        'email'=>$request->input('email'),
                        'password' => Hash::make($request->input('password')),
                        'phone'=>$request->input('phone'),
                        'money'=>$request->input('money'),
                        'level'=>$level
                    ]);
                if($userUpdate){
                    return redirect()
                    ->route('user.index')
                    ->with('edit','Chỉnh sửa thành công');
                }
                //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
                return back()->withInput();
            }
        }
        else return view('page.trangchu');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        dd($user);
        $findUser = User::find($user->id);
        if($findUser->delete()){
            return redirect()->route('user.index')
             ->with('delete','Xóa User thành công');
        }
        //return back()->withInput()->with('error','Company could not be delete');
    }
    public function deleteItem(Request $req)
    {
        if(Auth::check()){
            if(Auth::user()->level == 0){
                return view('page.trangchu');
            }
            else{
                $user = User::find($req->id);
                $countUser = User::where('level',1)->count();
                if($user->level == 1 && $countUser==1){
                    return redirect()->route('user.index')->with('thatbai','Không thể xóa Admin cuối cùng!');
                }
                else{
                    ruttien::where('iduser',$req->id)->delete();
                    giaodich::where('iduser',$req->id)->delete();
                    danhde::where('iduser',$req->id)->delete();
                    User::find($req->id)->delete();
                    return response()->json();
                }
            }
        }
        else return view('page.trangchu');
    }
}
