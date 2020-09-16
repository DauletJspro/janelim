<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeContraintInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        // Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            // $table->foreign('parent_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->dropForeign('FK_users_parent_id');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('FK_users_parent_id');
        });
    }
}
