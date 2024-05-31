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
        Schema::create('outstanding_bills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('status_id');
            $table->longText('notes');

            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('status_id')->references('id')->on('status_codes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outstanding_bills');
    }
};
