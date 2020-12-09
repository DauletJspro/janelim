<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeUpgradeTypeOfLuxPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')
            ->where(['packet_id' => \App\Models\Packet::LUX])
            ->update([
                'is_upgrade_packet' => false
            ]);
    }
}
