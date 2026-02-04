<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->after('plant_id');
            $table->decimal('price', 10, 2)->after('name');
            $table->text('description')->nullable()->after('price');
            $table->string('category')->nullable()->after('description');
            $table->string('image')->nullable()->after('category');
            $table->text('plant_care')->nullable()->after('image');
            $table->integer('stock_quantity')->default(0)->after('plant_care');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name','price','description','category','image','plant_care','stock_quantity']);
        });
    }
};
