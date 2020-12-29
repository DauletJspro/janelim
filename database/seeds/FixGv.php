<?php

use Illuminate\Database\Seeder;

class FixGv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userSeven = \App\Models\Users::where('user_id', '=', '317')->first();
        $userSeven->pv_balance = $userSeven->pv_balance - 20;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '19')->first();
        $userSeven->gv_balance = $userSeven->gv_balance - 20;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '198')->first();
        $userSeven->gv_balance = $userSeven->gv_balance - 40;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '11')->first();
        $userSeven->gv_balance = $userSeven->gv_balance - 40;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '419')->first();
        $userSeven->gv_balance = $userSeven->gv_balance - 40;
        $userSeven->save();
    }
}
