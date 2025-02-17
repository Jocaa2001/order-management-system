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
        Schema::table('parts', function (Blueprint $table) {
            $table->string('number')->nullable()->change();
            $table->double('price')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
            $table->unsignedBigInteger('category_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parts', function (Blueprint $table) {
            $table->string('number')->nullable(false)->change();
            $table->double('price')->nullable(false)->change();
            $table->string('description')->nullable(false)->change();
            $table->unsignedBigInteger('supplier_id')->nullable(false)->change();
            $table->unsignedBigInteger('category_id')->nullable(false)->change();
        });
    }
};
