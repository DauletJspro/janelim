<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PrepareDataBaseToTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\Users::whereNotNull('user_id')->get();
        foreach ($users as $user) {
            $user->user_money = 0;
            $user->password = Hash::make('123456');
            $user->status_id = null;
            $user->pv_balance = 0;
            $user->gv_balance = 0;
            $user->cv_balance = 0;
            $user->lv_balane = 0;
            $user->lux_bonus_limit = 1;
            $user->product_balance = 0;
            $user->last_premium_by_status = 0;
            $user->save();
        }
    }
}
