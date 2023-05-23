<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('lapang_id');
            $table->foreign('lapang_id')->references('id')->on('lapang');
        });
    }

    /**
     * Reverse the migrations.
     */
    /*
    public function down(): void
    {
        //
    }*/
};
