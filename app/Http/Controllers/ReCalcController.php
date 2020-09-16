<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use App\Models\Users;
use App\Models\UserPacket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReCalcController extends Controller
{

    public function reCalc() 
    {        
        $step = 0;
        $user = Users::where('user_id', 1)->first();
        $userChecked = [1];
        $userRank = [[1], [], [], [], [], [], [], [], [], []];        
        while($user) {
            // $user_follower = Users::where('recommend_user_id', $user->user_id)->whereNotIn('user_id', $userChecked)->orderBy('user_id', 'ASC')->first();            
            $user_follower = Users::where('recommend_user_id', $user->user_id)->get();            
            // if (!$user_follower) {
            //     $step--;
            //     $item = 0;
            //     while($step != 1) {                    
                    
            //     }
            // }
            // else {
            //     array_push($userChecked, $user_follower->user_id);
            //     $userRank[$step] = array_merge($userRank[$step], [$user_follower->user_id]);
            //     $step++;             
            // }
            // $user = $user_follower;

            // if (!$user || $step >= 10) {
            //     break;
            // }
        }
        dd($userRank);
    }

    public function makeZeroGV()
    {
        Users::where('gv_balance', '>', 0)->update(['gv_balance' => 0]);

        
        return 'success';
    }

    public function  banRepeatedUser() {
        // $users = Users::select('login', 'email', 'phone')->distinct()->get();
        $users = Users::select('user_id', 'login', 'email', 'phone')->get();
        $usersUnique = $users->unique('login')->unique('email')->unique('phone');
        $usersDupes = $users->diff($usersUnique);

        foreach ($usersDupes as $userDup) {
            $user_packet = UserPacket::where('user_id', $userDup->user_id)->where('is_active', 1)->first();
            $user_follower = Users::where('recommend_user_id', $userDup->user_id)->first();
            if (!$user_packet && !$user_follower) {                
                $userDup->delete();
            }
        }
        
        return $usersDupes;
    }
    
}
