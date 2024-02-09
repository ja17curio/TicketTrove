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
        Schema::create('event_tickets_availablity', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("available");
            $table->double("price");
            $table->unsignedBigInteger("ticket_type_id");
            $table->unsignedBigInteger("event_id");

            $table->foreign("event_id")->references("id")->on("events");
            $table->foreign("ticket_type_id")->references("id")->on("ticket_types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tickets_availablity');
    }
};
