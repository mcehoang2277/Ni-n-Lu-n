<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Infoname;
class CheckTableExistence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    { $id = session()->get('table');
    
        // Kiểm tra sự tồn tại của bàn trong cơ sở dữ liệu
        $table = Infoname::get();
        
        foreach ($table as $row1) {
            if ($row1->id_table == $id) {
                // Nếu tìm thấy bàn, tiếp tục xử lý yêu cầu
                return $next($request);
            }
        }
    
        // Nếu không tìm thấy bàn, chuyển hướng về trang chính
        return redirect()->route('welcome',['id' => $id])->with('error', 'Bàn không tồn tại!');

    }
}
