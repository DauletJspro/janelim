<?php

use Illuminate\Database\Seeder;

class AddPacketLevelPercentageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::SMALL])->update(['level_percentage' => '15-5-5-5-5-3-3-3-3-3']);
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::MEDIUM])->update(['level_percentage' => '15-5-5-5-5-3-3-3-3-3']);
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::LARGE])->update(['level_percentage' => '15-5-5-5-5-3-3-3-3-3']);
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::VIP])->update(['level_percentage' => '15-5-5-5-5-3-3-3-3-3']);
    }
}
