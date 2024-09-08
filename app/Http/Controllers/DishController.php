<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    function show(Request $request){
        if($request->q){
            $dish = Dish::where('name', 'like', "%$request->q%")
            ->whereIn('status', [1, 3])
            ->paginate(4);
        } else {
            $dish = Dish::whereIn('status', [1, 3])->paginate(4);
        }
        $category = Category::where('status', 1)->get();
        return view('admin.dish.add', compact('category', 'dish'));
        
    }

    function add(Request $request){
        
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        }
        $user = new Dish();
        $user->name = $request->name;
        $user->img = $image;
        $user->category = $request->category;
        $user->price = $request->price;
        $user->status = 1;
        $user->save();
        session()->flash('success', 'Thêm thành công món ăn' );   
        return redirect(route('dish.show'));
    }


     function delete($id){
        $user_detail = Dish::find($id);
        $user_detail->status = 2;
        $user_detail->save();
        session()->flash('success', 'Xoá thành công món ăn' . '-' . $user_detail->name);        
        return redirect(route('dish.show'));
     }
     function edit($id){
        $dish = Dish::find($id);
        $category = Category::where('status', 1)->get();
        return view('admin.dish.edit', compact('dish','category'));
    }
    function update(Request $request, $id){
// dd($request->all());
        if($request->category == null){
            $category = Dish::find($id)->category;
        }else{
            $category = $request->category;
        }
        $file = $request->file;
        if (!empty($file)) {
            $file->move('public/assets/img/', $file->getClientOriginalName());
            $image = 'assets/img/' . $file->getClientOriginalName();
        } else {
            $image = Category::find($id)->img;
        }
        $user_detail = Dish::find($id);
        $user_detail->name = $request->name;
        $user_detail->img = $image;
        $user_detail->price = $request->price;
        $user_detail->category = $category;
        $user_detail->save();
        session()->flash('success', 'Cập nhật thành công món ăn' . '-' . $user_detail->name);        
        return redirect(route('dish.show'));
    }

    function status($id){
        $dish = Dish::find($id);
        if($dish->status == 1){
            $dish->status = 3;
            $dish->save();
        }else{
            $dish->status = 1;
            $dish->save();
        }
        
        session()->flash('success', 'Cập nhật trạng thái thành công' );
        return redirect()->back();
    }
    
}
