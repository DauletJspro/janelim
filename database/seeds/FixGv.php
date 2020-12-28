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

        $userSeven = \App\Models\Users::where('user_id', '=', '4')->first();
        $userSeven->gv_balance = $userSeven->gv_balance + 640;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '7')->first();
        $userSeven->gv_balance = $userSeven->gv_balance + 140;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '9')->first();
        $userSeven->gv_balance = $userSeven->gv_balance + 100;
        $userSeven->save();

        $userSeven = \App\Models\Users::where('user_id', '=', '5')->first();
        $userSeven->gv_balance = $userSeven->gv_balance + 140;
        $userSeven->save();
    }
}
