<?php

namespace App\Http\Controllers\Index;

use App\Http\Helpers;
use App\Models\News;
use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
    public function showCompanyAdministration()
    {
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
        $administration = DB::table('administration')->first();
        $administration_persons = DB::table('administration_persons')->get();
        return view('design_index.about_us.company_administration', [
            'administration' => $administration,
            'administration_persons' => $administration_persons,
        ]);
    }

    public function showCompanyGuide()
    {
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
        $guideText = DB::table('guide')->first();  
        $administration = DB::table('administration')->first();
        $administration_persons = DB::table('administration_persons')->get();  
        $products = Product::all();    
        return view('new_design.about_us.index', [
            'guide_text' => $guideText,
            'administration' => $administration,
            'administration_persons' => $administration_persons,
            'products' => $products
        ]);
    }

    public function showCompanyLeaders()
    {
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
        $leader_ship = DB::table('leadership_advice')->first();
        $leaders = DB::table('leader_persons')->get();

        return view('design_index.about_us.company_leaders', [
            'leader_ship' => $leader_ship,
            'leaders' => $leaders,
        ]);
    }

}
