<?php

use App\Http\Controllers\Admin\LuxPacketController;
use Illuminate\Database\Seeder;

class Check extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_packet = \App\Models\UserPacket::where('user_packet_id', '<', 100)
            ->where('packet_id', '=', 5)
            ->where('is_active', '=', false)
            ->get();

        foreach ($user_packet as $item) {
//            $item->is_active = false;
//            $item->packet_id = 5;
            $item->packet_price = 260;
            $item->save();
        }
//        try {
//            app(LuxPacketController::class)->implement_bonuses(37);
//        } catch (Exception $exception) {
//            var_dump($exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage());
//        }

    }
}
