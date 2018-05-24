<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function update(Request $request){
        if(Auth::check()) {
            $orderCount = count(Order::all());
            $orderIds = [];
            for($i = 1; $i <= $orderCount; $i++){
                if(!in_array($request->get($i), $orderIds)){
                    $orderIds[] = $request->get($i);
                }
            }
            $orderIdsCount = count($orderIds);
            if($orderIdsCount === $orderCount){
                for($i = 1; $i < $orderCount; $i++){
                    $order = Order::find($i);
                    $order->home_blocks_id = $request->get($i);
                    $order->save();

                }
            }else{
                Session::flash('message', 'Volgorde mag niet twee dezelfde waarden bevatten.');
                Session::flash('alert-class', 'alert-danger');
                return redirect('admin/home');
            }
            Session::flash('message', 'Volgorde is aangepast.');
            Session::flash('alert-class', 'alert-success');
            return redirect('admin/home');
        }
    }
}
