<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsGvBalancePvBalanceCvBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_operation', function (Blueprint $table) {
            $table->integer('cv_balance')->nullable()->after('money');
            $table->integer('gv_balance')->nullable()->after('cv_balance');
            $table->integer('pv_balance')->nullable()->after('gv_balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
