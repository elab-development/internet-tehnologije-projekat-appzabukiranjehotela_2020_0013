<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->references('id')->on('city')->onDelete('set null');
        });
        Schema::table('reservation', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('hotel_id')->nullable()->references('id')->on('hotel')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel', function (Blueprint $table) {
            $table->dropForeign('city_id');
        });
        Schema::table('reservation', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('hotel_id');
        });
    }
}
