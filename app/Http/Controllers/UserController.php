<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function show(){
        $user = User::where('status',1)->paginate(3);
        return view('admin.user.add', compact('user'));
    }

    function add (Request $request){
       
        // dd(Auth::user()->name);
        $request->validate(
            [
                'name' => 'required',
                'date' => 'required',
                'email' => 'required|unique:users,email',

            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại',
                'alpha' => ':attribute lưu ý không điền kí tự, số !',
            ],
            [
                'name' => 'Tên',
                'date' => 'Ngày sinh',
                'img' => 'Ảnh',
            ],

        );
        $date = new DateTime($request->date);
        $formattedDate = $date->format('d/m/Y');  
        $onlyDate =  $date->format('dmY'); 
        // dd($formattedDate);
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        }
        $number = $onlyDate.str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        
        $password = Hash::make($formattedDate);
        $user = new User();
        $user->name = $request->name;
        $user->img = $image;
        $user->phone = $request->phone;
        $user->status = 1;
        $user->role = $request->role;
        $user->code = $number;
        $user->email = $request->email;
        $user->date = $formattedDate;
        $user->password = $password;
        $user->save();
        session()->flash('success', 'Thêm thành công nhân viên' );   
        return redirect(route('user.show'));
    }

    function detail($id){
        $user = User::find($id);
        return view('admin.user.detail',compact('user'));
    }

    function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    function update(Request $request, $id){
        if($request->category == null){
            $formattedDate = User::find($id)->date;
        }else{
            $date = new DateTime($request->date);
        $formattedDate = $date->format('d/m/Y');
        }
        
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        } else {
            $image = User::find($id)->img;
        }
        $user =User::find($id);
        $user->name = $request->name;
        $user->img = $image;
        $user->email = $request->email;
        $user->date = $formattedDate;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        session()->flash('success', 'Cập nhật thành công ');        
        return redirect(route('user.show'));
    }

    function delete($id){
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        session()->flash('success', 'Xóa thành công ');        
        return redirect(route('user.show'));
    }
}
