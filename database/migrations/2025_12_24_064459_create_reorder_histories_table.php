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
    Schema::create('reorder_histories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('plant_id');
        $table->string('product_name');
        $table->string('category');
        $table->string('supplier_name');
        $table->integer('reorder_quantity'); // EOQ
        $table->date('reorder_date');
        $table->date('expected_delivery_date');
        $table->timestamps();

        $table->foreign('plant_id')->references('id')->on('inventory')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reorder_histories');
    }
};
