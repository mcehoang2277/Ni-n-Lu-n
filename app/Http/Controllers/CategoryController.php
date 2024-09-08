<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    function show(){
        $category = Category::where('status', 1)->paginate(4);;
        return view('admin.category.add', compact('category'));
    }

    function add(Request $request){
        
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        }
        $user = new Category();
        $user->name = $request->name;
        $user->img = $image;
        
        $user->status = 1;
        $user->save();
        session()->flash('success', 'Thêm thành công danh mục' );   
        return redirect(route('category.show'));
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
