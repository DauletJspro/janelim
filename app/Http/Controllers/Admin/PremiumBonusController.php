<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;

class PremiumBonusController extends Controller
{
    public function run($user_id = null, $check_all = false)
    {
        if ($check_all) {
            $users = \App\Models\Users::all();
            foreach ($users as $user) {
                if (in_array($user->status_id, [2, 3, 4, 5, 6, 7, 8])) {
                    $this->check_is_enough($user->status_id, $user->user_id);
                }

            }
        } else {
            $user = Users::where(['user_id' => $user_id])->first();
            if (in_array($user->status_id, [2, 3, 4, 5, 6, 7, 8])) {
                $this->check_is_enough($user->status_id, $user->user_id);
            }
        }
    }

    public function check_is_enough($status, $user_id)
    {

        $individualBalance = 0;
        $groupBalance = 0;
        $tripleChildBalance = 0;
        $bonusKzt = 0;

        switch ($status) {
            case UserStatus::CONSULTANT:
                $individualBalance = 60;
                $groupBalance = 3000;
                $tripleChildBalance = 1000;
                $bonusKzt = 150000;
                break;
            case UserStatus::MANAGER:
                $individualBalance = 120;
                $groupBalance = 9000;
                $tripleChildBalance = 3000;
                $bonusKzt = 450000;
                break;
            case UserStatus::DIRECTOR:
                $individualBalance = 240;
                $groupBalance = 27000;
                $tripleChildBalance = 9000;
                $bonusKzt = 1000000;
                break;
            case UserStatus::BRONZE_DIRECTOR:
                $individualBalance = 240;
                $groupBalance = 81000;
                $tripleChildBalance = 27000;
                $bonusKzt = 2500000;
                break;
            case UserStatus::SLIVER_DIRECTOR:
                $individualBalance = 240;
                $groupBalance = 243000;
                $tripleChildBalance = 81000;
                $bonusKzt = 6500000;
                break;
            case UserStatus::GOLD_DIRECTOR:
                $individualBalance = 240;
                $groupBalance = 729000;
                $tripleChildBalance = 243000;
                $bonusKzt = 20000000;
                break;
            case UserStatus::BRILLIANT_DIRECTOR:
                $individualBalance = 240;
                $groupBalance = 2187000;
                $tripleChildBalance = 729000;
                $bonusKzt = 40000000;
                break;
        }


        $user = Users::where(['user_id' => $user_id])->first();
        $user_pv_balance = $user->pv_balance;
        $user_gv_balance = $user->gv_balance;


        if ($user_pv_balance >= $individualBalance && $user_gv_balance >= $groupBalance && $this->enough_child($user_id, $tripleChildBalance)) {
            $bonusDollar = $bonusKzt / Currency::DollarToKzt;
            $this->give_bonus($user->user_id, $bonusDollar, $status);
        }
    }

    public function enough_child($user_id, $tripleChildBalance)
    {

        $users = DB::table('users')
            ->where('recommend_user_id', $user_id)
            ->where('gv_balance', '>=', $tripleChildBalance)
            ->get();


        if (count($users) >= 3) {
            return true;
        }
        return false;
    }

    public function give_bonus($user_id, $money, $status)
    {
        $user = Users::where(['user_id' => $user_id])->first();
        if ($user->last_premium_by_status < $status && in_array($status, [2, 3, 4, 5, 6, 7, 8])) {
            $user->user_money = $user->user_money + $money;
            $user->last_premium_by_status = $status;
            $user->save();
        }


    }
}