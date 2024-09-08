<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Bill;
use App\Models\Table;
use App\Models\ListOrder;
use App\Models\infoOrder;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bill1 = infoOrder::count();
        // dd($bill);
        $dish1 = Dish::count();
        $category = Category::whereIn('status',[1,3])->count();
        $table = Table::count();
        $order = Table::whereIn('status',[2,3,4,5])->count();
        $user = User::whereIn('status',[1,2])->count();
        $orderTotal = Bill::where('status', 1)->get();
        $totalRevenue = 0;

        foreach ($orderTotal as $bill) {
            $dish = Dish::find($bill->dish);
            if ($dish) {
                $totalRevenue += $dish->price * $bill->qty;
            }
        }


        
        return view('home',compact('bill1','dish1','category','table','order','user','totalRevenue'));
    }

    function total(Request $request){
        if ($request->seach) {
    $selectedMonth = $request->seach;

    // Lấy ngày đầu tiên và cuối cùng của tháng được chọn
    $firstDayOfMonth = date('Y-m-01', strtotime($selectedMonth));
    $lastDayOfMonth = date('Y-m-t', strtotime($selectedMonth));

    // Lấy các hóa đơn có ngày tạo trong tháng được chọn
    $orderTotal = Bill::where('status', 1)
                      ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
                      ->get();

    $totalRevenue = 0;
dd($lastDayOfMonth);
    foreach ($orderTotal as $bill) {
        $dish = Dish::find($bill->dish);
        if ($dish) {
            $totalRevenue += $dish->price * $bill->qty;
        }
    }
}else{
            $orderTotal = Bill::where('status', 1)->get();
        $totalRevenue = 0;

        foreach ($orderTotal as $bill) {
            $dish = Dish::find($bill->dish);
            if ($dish) {
                $totalRevenue += $dish->price * $bill->qty;
            }
        }
        }
        return view('admin.total', compact('totalRevenue'));
    }
}
