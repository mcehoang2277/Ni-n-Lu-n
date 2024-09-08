<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Bill;
use App\Models\Table;
use App\Models\ListOrder;
class CartController extends Controller
{
    function add(Request $request, $id){
        
        $dish = Dish::find($id);
        Cart::add(
            [
                'id' => $dish->id, 
                'name' => $dish->name, 
                'qty' => 1, 
                'price' => $dish->price, 
                'options' => ['img' => $dish->img,'session'=>session()->get('table')]
            ]
        );
        return redirect(route('cart.show'));
        // return redirect()->back();
      
    }

    function show(){
        $sessionValue = session()->get('table');
        $cartItems = Cart::content()->filter(function ($item) use ($sessionValue) {
            return $item->options['session'] === $sessionValue;
        });
        // dd($cartItems->sum('qty'));
        if($cartItems->sum('qty') == 0){
            session()->flash('success', 'Giỏ hàng bị trống' );   
            return redirect(route('OrderClient.show',session()->get('table')));
        }
        return view('client.cart.show');
    }
    function cartdelete($rowId){
       Cart::remove($rowId);
       session()->flash('success', 'Bạn đã xoá món ăn' );   
        
       return redirect(route('cart.show'));
    }

    function remove(){
        Cart::destroy();
        session()->flash('success', 'Giỏ hàng bị xoá xin chọn lại món' );   
         
        return redirect(route('OrderClient.show',session()->get('table')));
     }

     function addSql(){
        foreach (Cart::content() as $item) {
            $order = Bill::where('dish', $item->id)
                               ->where('table', session()->get('table'))->where('status', 2)
                               ->first();
        
            if ($order) {
                $order->qty += $item->qty;
                $order->save();
            } else {
                $order = new Bill();
                $order->dish = $item->id;
                $order->qty = $item->qty;
                $order->status =2;
                $order->table = session()->get('table');
                $order->save();
            }
        }
                $order1 = new ListOrder();
                $order1->dish = $item->id;
                $order1->qty = $item->qty;
                $order1->table = session()->get('table');
                $order1->save();

                $table = Table::find(session()->get('table'));
                $table->status = 2;
                $table->save();
        Cart::destroy();
        session()->flash('success', 'Gọi món thành công' );   
         
        return redirect(route('OrderClient.show',session()->get('table')));
        
     }
     function order(){
        // dd(session()->get('table'));
        $order = Bill::where('table',session()->get('table'))->where('status',2)->get();
        if($order->count()==0){
            session()->flash('success', 'Bạn chưa gọi món !' );   
            return redirect(route('OrderClient.show',session()->get('table')));
        }else{

            return view('client.cart.order',compact('order'));
        }

     }

     function edit($rowId){
        $item = Cart::get($rowId);
        return view('client.cart.update',compact('item'));
     }

     function update(Request $request,$rowId){
        // dd($request->all());
        Cart::update($rowId, ['qty' => $request->qty]); // Will update the name
        session()->flash('success', 'Bạn đã cập nhật số lượng' );   
        
       return redirect(route('cart.show'));
     }
}
