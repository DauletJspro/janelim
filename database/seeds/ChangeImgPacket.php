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
        DB::table('packet')->where('packet_id', '=', 2)->update([
            'packet_image' => '/media/Medium-last.jpeg'
        ]);

    }
}
