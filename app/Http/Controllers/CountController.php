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
        $url = URL::route('home') . '#counter_' . $id;

        if($request->session()->has('counter_'.$id)){
            return redirect($url);

        }

        $request->session()->put('counter_'.$id, 'true');
        $homeBlock = HomeBlock::find($id);
        $homeBlock->counter_value += 1;
        $homeBlock->save();

        return redirect($url);
    }
}
