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
        $userSeven->user_money = $userSeven->user_money + 15.8;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '7')->first();
        $userSeven->user_money = $userSeven->user_money + 3.6;
        $userSeven->save();
    }
}
