<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Currency extends Model
{
    protected $table = 'currency';
    protected $primaryKey = 'currency_id';

    const DOLLAR = 1;
    const PV = 2;
    const GV = 3;
    const CV = 4;

    const PVtoKzt = 600;
    const GVtoKzt = 500;
    const DollarToKzt = 500;

    public static function usdToKzt()
    {
        $currency = Currency::where(['currency_id' => self::DOLLAR])->first();
        return $currency->amount_in_kzt;
    }

    public static function pvToKzt()
    {
        $currency = Currency::where(['currency_id' => self::PV])->first();
        return $currency->amount_in_kzt;
    }


}
