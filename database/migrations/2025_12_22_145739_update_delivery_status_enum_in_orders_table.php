<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // 🔴 Fix existing wrong values FIRST
        DB::statement("
            UPDATE orders 
            SET delivery_status = 'Pending Delivery'
            WHERE delivery_status = 'Pending'
        ");

        // 🟢 Enforce allowed values at DB level
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('delivery_status', [
                'Pending Delivery',
                'Out for Delivery',
                'Completed'
            ])->default('Pending Delivery')->change();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('delivery_status')->change();
        });
    }
};

