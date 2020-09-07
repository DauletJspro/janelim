
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers;
use Auth;

class LangController extends Controller
{

    public function setLocale($locale) {
        if (! in_array($locale, ['en', 'ru', 'kz'])) {
            abort(400);
        }
        App::setLocale($locale);
        return redirect()->back();
    }    
}