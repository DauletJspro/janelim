<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ChangeUserPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('user_id', '30')->update(['password' => Hash::make('qwerty123')]);
        DB::table('users')->where('user_id', '31')->update(['password' => Hash::make('qwerty123')]);
    }
}
