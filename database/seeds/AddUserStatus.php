<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddUserStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->truncate();
        DB::table('user_status')->insert([
            'user_status_name' => 'Клиент 1',
            'sort_num' => 1
       ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Клиент 2',
            'sort_num' => 2
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Клиент 3',
            'sort_num' => 3
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Клиент 4',
            'sort_num' => 4
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Консультант',
            'sort_num' => 5
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Менеджер',
            'sort_num' => 6
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Директор',
            'sort_num' => 7
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Бронзовый директор',
            'sort_num' => 8
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Серебряный директор',
            'sort_num' => 9
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Золотой директор',
            'sort_num' => 10
        ]);
        DB::table('user_status')->insert([
            'user_status_name' => 'Бриллиантовый директор',
            'sort_num' => 11
        ]);

    }
}
