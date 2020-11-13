<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPacketLUXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $packet = \App\Models\Packet::where(['packet_id' => 5])->first();
        $packet->delete();

        DB::table('packet')->insert(
            [
                'packet_id' => 5,
                'packet_name_ru' => 'LUX',
                'packet_price' => 260,
                'currency_id' => 2,
                'is_show' => true,
                'sort_num' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'packet_css_color' => '50C7C1',
                'packet_available_level' => 10,
                'level_percentage' => null,
                'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
                'packet_thing' => 'Обучение + 12 Продукт + Back office + Бонусовая система',
                'packet_lection' => '',
                'packet_status_id' => '',
                'is_upgrade_packet' => true,
            ]
        );
    }
}
