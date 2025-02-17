<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('priority')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->string('condition')->nullable()->change();
            $table->integer('days_valid')->nullable()->change();
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
            $table->unsignedBigInteger('part_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('priority')->nullable(false)->change();
            $table->integer('quantity')->nullable(false)->change();
            $table->string('condition')->nullable(false)->change();
            $table->integer('days_valid')->nullable(false)->change();
            $table->unsignedBigInteger('supplier_id')->nullable(false)->change();
            $table->unsignedBigInteger('part_id')->nullable(false)->change();
        });
    }
};
