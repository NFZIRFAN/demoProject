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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Plant name
            $table->string('image'); // Store image path
            $table->decimal('price', 8, 2); // Current price
            $table->text('description')->nullable(); // Plant description
            $table->integer('stock_quantity')->default(0); // Stock count
            $table->integer('reorder_level')->default(10); // Minimum stock before reorder
            $table->string('category')->nullable(); // Plant category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
