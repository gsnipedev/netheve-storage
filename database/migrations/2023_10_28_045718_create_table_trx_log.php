<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('trx_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trx_id');
            $table->foreign('trx_id')->references('id')->on('trx');
            $table->unsignedBigInteger('issuer');
            $table->foreign('issuer')->references('id')->on('users');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('trx_log');
    }
};
