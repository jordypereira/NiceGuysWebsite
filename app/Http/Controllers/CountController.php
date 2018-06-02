<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBlock;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CountController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {

        $yHeight = $request->get("y-value");
        $url = URL::route('home') . '?y=' . $yHeight;

        if($request->session()->has('counter_'.$id)) {
            return redirect()->to('/' . '?y=' . $yHeight);
        }

        $request->session()->put('counter_'.$id, 'true');

        $homeBlock = HomeBlock::find($id);
        $homeBlock->counter_value += 1;
        $homeBlock->save();

        return redirect($url);
    }
}
