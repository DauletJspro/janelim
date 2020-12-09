<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeToPersonalValue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')
            ->insert([
                'operation_type_id' => 40,
                'operation_type_name_ru' => 'Личный объем',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
