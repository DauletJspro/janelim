<?php

use Illuminate\Database\Seeder;

class ChangeGvValue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')->where('operation_type_id', 11)->update([
            'operation_type_name_ru' => 'Групповой объем'
        ]);
    }
}
