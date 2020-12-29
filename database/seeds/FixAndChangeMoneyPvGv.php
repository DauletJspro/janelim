<?php

use Illuminate\Database\Seeder;

class FixAndChangeMoneyPvGv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSeven = \App\Models\Users::where('user_id', '=', '4')->first();
        $userSeven->user_money = $userSeven->user_money + 28;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '7')->first();
        $userSeven->user_money = $userSeven->user_money + 40.63;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '9')->first();
        $userSeven->user_money = $userSeven->user_money + 19;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '317')->first();
        $userSeven->user_money = $userSeven->user_money + 3;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '5')->first();
        $userSeven->user_money = $userSeven->user_money + 1.2;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '8')->first();
        $userSeven->user_money = $userSeven->user_money + 2.4;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '201')->first();
        $userSeven->user_money = $userSeven->user_money + 2.4;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '235')->first();
        $userSeven->user_money = $userSeven->user_money + 1.2;
        $userSeven->save();

    }
}
