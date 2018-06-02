<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBlock;

class CountController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request, $id) {
        if($request->session()->has('counter_'.$id)){
            return redirect()->to('/');
        }

        $request->session()->put('counter_'.$id, 'true');
        $homeBlock = HomeBlock::find($id);
        $homeBlock->counter_value += 1;
        $homeBlock->save();

        return redirect()->to('/');
    }
}
