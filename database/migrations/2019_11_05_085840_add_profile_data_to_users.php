<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileDataToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->text('country')->nullable();
            $table->longText('description')->nullable();
            $table->string('user_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dob')->nullable();
            $table->dropColumn('gender')->nullable();
            $table->dropColumn('country')->nullable();
            $table->dropColumn('description')->nullable();
            $table->dropColumn('user_image')->nullable();
        });
    }
}
