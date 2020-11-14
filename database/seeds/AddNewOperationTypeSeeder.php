<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddNewOperationTypeSeeder extends Seeder
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
                'operation_type_id' => 35,
                'operation_type_name_ru' => 'Цикличный доход',
            ]);
    }
}
