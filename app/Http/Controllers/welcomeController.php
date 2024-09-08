<?php

namespace App\Http\Controllers;
use App\Models\infoname;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    function welcome($id){
        $table = infoname::get();
        foreach ($table as $row1) {
            if($row1->id_table == $id){
                session()->forget('table');
                session()->put('table', $id); 
                return redirect(route('OrderClient.show',$id));
            }
        }
        return view('welcome', compact('id'));
    }
    
    function add(Request $request, $id){
        $user = new infoname();
        $user->name = $request->name;
        $user->id_table = $id;
        $user->save();
        session()->put('table', $id);
        return redirect(route('OrderClient.show',$id));
    }
}
