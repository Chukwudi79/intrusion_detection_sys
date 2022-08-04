<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Assessment extends Controller
{
    public function assess(Request $request)
    {
        // return $request->all();
        $adder = [];
        foreach($request->all() as $key => $val)
        {
            $adder[] = $val;
        }

        array_shift($adder);
        $sum = array_sum($adder);

        switch (true) {
            case $sum >= 69:
                $msg = 'You current cyber security practice is rated at 70%. There are still more you can do to be 99% secured from cyber attacks';
                $type = 'success';
                break;

            case $sum >= 50:
                $msg = 'You current cyber security practice is rated at 50%. You should practice more of those questions you choosed "False" to ensure 99% security against cyber attacks';
                $type = 'warning';
                break;

            case $sum >= 40:
                $msg = 'You current cyber security practice is rated at 40% which is below average. You are at high risk of getting attacked.';
                $type = 'danger';
                break;
                
            default:
                $msg = 'You current cyber security practice is rated at 0%. You are at high risk of getting attacked.';
                $type = 'danger';
                break;
        }

        if($type != 'success'){
            return redirect()->route('homepage', '#free_check')->withErrors($msg);

        }

        return redirect()->route('homepage', '#free_check')->withSuccess($msg);
    }
}
