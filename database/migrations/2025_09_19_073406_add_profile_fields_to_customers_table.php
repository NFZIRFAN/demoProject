<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('customers', function (Blueprint $table) {
        $table->string('profile_picture')->nullable();   // store image path
        $table->string('address')->nullable();
        $table->string('postcode', 10)->nullable();
        $table->string('relationship')->nullable();
        $table->integer('age')->nullable();
        $table->string('occupation')->nullable();
    });
}

public function down()
{
    Schema::table('customers', function (Blueprint $table) {
        $table->dropColumn([
            'profile_picture',
            'address',
            'postcode',
            'relationship',
            'age',
            'occupation'
        ]);
    });
}
};