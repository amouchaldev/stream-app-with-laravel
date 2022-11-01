<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('streams', function (Blueprint $table) {
            $table->unsignedBigInteger('episode_id')->nullable()->default("NULL")->change();
            $table->foreignId('movie_id')->after('episode_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('streams', function (Blueprint $table) {
            // $table->unsignedBigInteger('episode_id')>notNullValue()->change();
            $table->dropForeign(['movie_id']);
        });
    }
};
