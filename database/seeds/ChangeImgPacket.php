<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeImgPacket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->where('packet_id', '=', 1)->update([
           'packet_image' => '/media/Small-min_1 (1).jpeg'
        ]);
        DB::table('packet')->where('packet_id', '=', 2)->update([
            'packet_image' => '/media/Medium-min-min (1)-min.png'
        ]);
        DB::table('packet')->where('packet_id', '=', 3)->update([
            'packet_image' => '/media/Large-min (1).jpeg'
        ]);
        DB::table('packet')->where('packet_id', '=', 4)->update([
            'packet_image' => '/media/VIP-min (1).jpeg'
        ]);
        DB::table('packet')->where('packet_id', '=', 5)->update([
            'packet_image' => '/media/LUX-min (1).jpeg'
        ]);

    }
}
