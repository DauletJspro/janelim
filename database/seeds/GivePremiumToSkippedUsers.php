<?php

use App\Http\Controllers\Admin\PremiumBonusController;
use App\Models\Currency;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GivePremiumToSkippedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(PremiumBonusController::class)->run(null, true);
    }
}
