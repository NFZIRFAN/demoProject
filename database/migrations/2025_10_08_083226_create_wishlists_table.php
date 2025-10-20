<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('wishlists', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');
        $table->unsignedBigInteger('plant_id');
        $table->timestamps();

        // Optional: prevent duplicates
        $table->unique(['customer_id', 'plant_id']);

        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
