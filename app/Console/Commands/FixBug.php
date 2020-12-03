<?php

namespace App\Console\Commands;

use App\Models\Users;
use Illuminate\Console\Command;

class FixBug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gv:fix_bug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fix_bug:gv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $item = Users::all();
        $fixResultGv = [
            'Zeinel' => '640',
            'Vip' => '140',
            'Magnit777' => '140',
            'Daniar888' => '888',
            'Zeinel73' => '160',
            'Million$$$' => '100',
            'Fatima74' => '60',
            'Nazira68' => '40',
            'Aizat' => '20',
            'Gulnur' => '20',
            'Gold888' => '20',
            'Bogat888' => '60',
            'Sad888' => '20',
            'Vip777' => '300',
            'Trillioner9999' => '300',
            'Blago$$$' => '300',
            'Eltemir6789' => '300',
            'Eltemir$$$$' => '240',
            'Eltemir777' => '60',
            'Eltemir$$$' => '60',
            'Magnit7' => '40',
            'Madik06' => '40',
            'Baiadam21' => '40',
            'Saulemillion' => '40',
            'Sauleluch' => '40',
            'Gulsum62' => '20',
            'Magnit' => '100',
            'Daniar777' => '100',
            'Vip77' => '80',
            'Vip999' => '80',
            'Vip75' => '80',
            'Bereke' => '20',
            'Udacha111' => '20'
        ];

        $fixResultMoney = [
            'Zeinel' => '15.8',
            'Magnit777' => '3.6',
        ];


        foreach ($item as $value) {
            if (array_key_exists(preg_replace('/\s+/', '', $value->login), $fixResultGv)) {
                $gv_balance = ((int)$fixResultGv[$value->login]);
                $value->gv_balance = $value->gv_balance + $gv_balance;
                $value->save();
            }
            if (array_key_exists(preg_replace('/\s+/', '', $value->login), $fixResultMoney)) {
                $user_money = ((int)$fixResultMoney[$value->login]);
                $value->user_money = $value->user_money + $user_money;
                $value->save();
            }


        }
//
//        foreach ($item as $value){
//            if(array_key_exists($fixResultMoney, $value->user_login)){
//                $value->user_money = $value->user_money + $fixResultMoney[$value->user_login];
//                $value->save();
//            }
//        }

    }
}
