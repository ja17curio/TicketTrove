<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('ticket_types_id')->references('id')->on('ticket_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('order_id');
            $table->dropForeign('ticket_types_id');
        });
    }
};
