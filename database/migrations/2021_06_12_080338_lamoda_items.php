<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LamodaItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamoda_items', function (Blueprint $table) {
            $table->id();
            $table->string('seller_sku');
            $table->string('shop_sku');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('reservedStock');
            $table->integer('preVerificationStock');
            $table->integer('available');
            $table->string('consignments')->nullable();
            $table->string('consignments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamoda_items');
    }
}
