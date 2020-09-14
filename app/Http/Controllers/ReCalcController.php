<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use App\Models\News;
use App\Models\About;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReCalcController extends Controller
{

    public function reCalc() 
    {
        // set_time_limit(500);
        $step = 0;
        $user = Users::where('user_id', 1)->first();
        $userChecked = [1];
        $userRank = [[],[],[],[],[],[],[],[],[],[]];
        while($user) {
            $user_follower = Users::where('recommend_user_id', $user->user_id)->whereNotIn('user_id', $userChecked)->orderBy('user_id', 'ASC')->first();
            if (!$user_follower) {
                $step--;
                $item = 0;
                while($step != 0) {                    
                    if (count($userRank[$step]) <= $item) {
                        $item = 0;
                        $step--;                        
                    }
                    else {
                        $user_follower = Users::where('recommend_user_id', $userRank[$step][$item])->whereNotIn('user_id', $userChecked)->orderBy('user_id', 'ASC')->first();        
                        if (!$user_follower) {
                            $item++;
                        }
                        else {
                            break;
                        }
                    }
                }
            }
            else {
                array_push($userChecked, $user_follower->user_id);
                $userRank[$step] = array_merge($userRank[$step], [$user_follower->user_id]);
                $step++;
                // $user->gv_balance = $user->gv_balance + ($user_follower->pv_balance + $user_follower->gv_balance);
                // $user->save();
            }
            $user = $user_follower;

            if (!$user || $step >= 10) {
                break;
            }
        }
        dd($userRank);
    }

    public static function makeZeroGV()
    {
        Users::where('gv_balance', '>', 0)->update(['gv_balance' => 0]);

        return 'success';
    }    
    
}
