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
            'packet_image' => '/media/small.png'
        ]);

        DB::table('packet')->where('packet_id', '=', 2)->update([
            'packet_image' => '/media/Medium.png'
        ]);

        DB::table('packet')->where('packet_id', '=', 3)->update([
            'packet_image' => '/media/Large-min (1) (1).png'
        ]);

        DB::table('packet')->where('packet_id', '=', 4)->update([
            'packet_image' => '/media/VIP.png'
        ]);

        DB::table('packet')->where('packet_id', '=', 5)->update([
            'packet_image' => '/media/LUX.png'
        ]);

    }
}
