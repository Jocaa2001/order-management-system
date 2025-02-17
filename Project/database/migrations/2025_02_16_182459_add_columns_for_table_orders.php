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
            $table->integer('priority');
            $table->integer('quantity');
            $table->string('condition');
            $table->integer('days_valid');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('part_id')->constrained('parts');
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
            $table->dropColumn(['priority', 'quantity', 'condition', 'days_valid']);
            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
            $table->dropForeign(['part_id']); 
            $table->dropColumn('part_id');
        });
    }
};
