<?php

use Illuminate\Database\Seeder;

class ChangPacketAvailableLevel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->whereIn('packet_id', [1, 2, 3, 4, 5])->update([
           'packet_available_level' => 10
        ]);
    }
}
