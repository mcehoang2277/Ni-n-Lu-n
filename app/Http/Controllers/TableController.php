<?php

namespace App\Http\Controllers;
use App\Models\ListOrder;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\infoname;
use App\Models\infoOrder;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Dish;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class TableController extends Controller
{
    public function ajax()
    {
        $data = Table::all(); // Lấy dữ liệu từ cơ sở dữ liệu
        
        
        return response()->json($data); // Trả về dữ liệu dưới dạng JSON
    }

    public function show()
    {
        return view('admin.table.test'); // Trả về dữ liệu dưới dạng JSON
    }

    public function detail(Request $request, $id)
    {
        $query = $request->input('q');
        $category = Category::whereIn('status', [1, 3])->get();
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
        $list_order = ListOrder::where('table',$id)->get();
        // dd($list_order);
        return view('admin.table.detail', compact('list_order','id','category','searchResults')); 
    }

    function add_dish($id,$soban){
        $dish = Dish::find($id);
        return view('admin.table.detail_dish',compact('id','soban','dish'));
    }
    function create_dish(Request $request ,$id,$soban){
        $dish = Dish::find($id);
        $dishExists = infoname::where('id_table', $soban)->exists();
        if (!$dishExists) {
            $info_name = new infoname();
            $info_name->name = 'Admin';
            $info_name->id_table = $soban;
            $info_name->save();
        } 
        $info_name = new infoname();
        $info_name->name = 'Admin';
        $info_name->id_table = $soban;
        $info_name->save();
       
            $order = Bill::where('dish', $id)
                               ->where('table', session()->get('table'))->where('status', 2)
                               ->first();
        
            if ($order) {
                $order->qty += $request->qty;
                $order->save();
            } else {
                $order = new Bill();
                $order->dish = $dish->id;
                $order->qty = $request->qty;
                $order->status =2;
                $order->table = $soban;
                $order->save();
            }
        
                $order1 = new ListOrder();
                $order1->dish = $id;
                $order1->qty = $request->qty;
                $order1->table = $soban;
                $order1->save();

                $table = Table::find($soban);
                $table->status = 3;
                $table->save(); //table.detail
            session()->flash('success', 'Xác nhận goi mon thanh cong' );   
            return redirect(route('table.detail',$soban));
    }
    function confirm($id){
        $table =Table::find($id);
        $table->status = 3;
        $table->save();
        session()->flash('success', 'Xác nhận món thành công bàn'.$id );   
        
       return redirect(route('test.show'));
    }

    function bill($id){
        $infoname = infoname::where('id_table', $id)->first()->created_at->format('H:i');
        // dd($infoname);
        $time_out = Carbon::now()->format('H:i');
        $bill = Bill::where('table',$id)->where('status',2)->get();
        $currentDateTime = Carbon::now();
        $onlyDate = $currentDateTime->format('dm'); 
        $number = $onlyDate.str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // $sum_total = $bill->sum('')
        return view('admin.table.bill', compact('infoname','time_out','bill','id','number'));
    }

    function savebill($id,$number){
        $name = infoname::where('id_table',$id)->first()->name;
        $order1 = new InfoOrder();
        $order1->name = $name;
        $order1->table = $id;
        $order1->number = $number;
        $order1->save();

        Bill::where('table', $id)->where('status', 2)->update(['status' => 1, 'id_info_order' => $number]);
        Table::where('id', $id)->update(['status' => 1]);
        DB::table('infonames')->where('id_table', $id)->delete();
        DB::table('list_orders')->where('table', $id)->delete();

        session()->flash('success', 'Thanh toán thành công bàn số '.$id );   
        
       return redirect(route('test.show'));
    }
    function list_bill(Request $request){
        if($request->q){
            $bill = infoOrder::where('name', 'like', "%$request->q%")
            ->paginate(10);
        }else{
            $bill = infoOrder::orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.table.list_bill', compact('bill'));
    }

    function detail_bill($id){
        $dish = Bill::where('id_info_order',$id)->get();
        $time_in = Bill::where('id_info_order', $id)->first()->created_at->format('H:i');
        $time_out = Bill::where('id_info_order', $id)->first()->updated_at->format('H:i');
        $date = Bill::where('id_info_order', $id)->first()->updated_at->format('d/m/Y');
        return view('admin.table.detail_bill', compact('dish','time_in','time_out','id','date'));
    }
}
