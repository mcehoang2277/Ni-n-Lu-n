<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Table;
class OrderClientController extends Controller
{
    function show(){
        // dd(session()->get('table'));
        $category = Category::where('status', 1)->get();
        return view('client.orderhome', compact('category'));
    }

    public function search(Request $request)
        {
            $query = $request->input('q');
            $category = Category::where('status', 1)->get();
            $searchResults = [];

            foreach ($category as $item) {
                $dishes = Dish::whereIn('status', [1, 3])
                            ->where('category', $item->id)
                            ->where('name', 'like', "%$query%")
                            ->get();
                if ($dishes->isNotEmpty()) {
                    $searchResults[$item->name] = $dishes;
                }
            }

            return view('client.orderhome', compact('category', 'searchResults'));
        }
    
        function call($id){
            $table = Table::find($id);
            $table->status = 5;
            $table->save();
            session()->flash('success', 'Bạn đã gọi nhân viên' );   
            return redirect()->back();

        }

        function pay($id){
            $table = Table::find($id);
            $table->status = 4;
            $table->save();
            session()->flash('success', 'Bạn đã gọi thanh toán' );   
            return redirect()->back();
        }
}
