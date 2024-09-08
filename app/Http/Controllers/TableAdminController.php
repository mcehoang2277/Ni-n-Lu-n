<?php

namespace App\Http\Controllers;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\Category;
class TableAdminController extends Controller
{
    function show(){
        $table = Table::paginate(4);
        return view('admin.TableAdmin.add', compact('table'));
    }

    function add(Request $request){
        
        
        $request->validate(
            [
                'name' => 'required|unique:tables,name'

            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại',
            ],
            [
                'name' => 'Số Bàn',
            ],

        );
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        }
        $user = new Table();
        $user->name = $request->name;
        $user->status = 1;
        $user->img = $image;
        $user->save();
        session()->flash('success', 'Thêm thành công bàn ăn' );   
        return redirect(route('TableAdmin.show'));
    }

    function delete($id){
        $user_detail = Category::find($id);
        $user_detail->status = 2;
        $user_detail->save();

        session()->flash('success', 'xoá thành công danh mục' . '-' . $user_detail->name);        
        return redirect(route('category.show'));
    }

    function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    function update(Request $request, $id){
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        } else {
            $image = Category::find($id)->img;
        }
        $user_detail = Category::find($id);
        $user_detail->name = $request->name;
        $user_detail->img = $image;
        $user_detail->save();
        session()->flash('success', 'Cập nhật thành công danh mục' . '-' . $user_detail->name);        
        return redirect(route('category.show'));
    }
}
