<?php

use Illuminate\Database\Seeder;

class FixImageProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->where('product_id', '=', 2)->update([
           'product_image' => '/custom2/img/Jan-quaty.png'
        ]);
        DB::table('product')->where('product_id', '=', 3)->update([
            'product_image' => '/custom2/img/Jan-tazalygy.png'
        ]);
        DB::table('product')->where('product_id', '=', 4)->update([
            'product_image' => '/custom2/img/Jan-tynyshtygy.png'
        ]);
    }
}
