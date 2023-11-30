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
        Schema::create('detail_shopping_carts', function (Blueprint $table) {
            $table->id();
            $table ->integer('quanty');
            $table ->integer('unit_price');
            $table->unsignedBigInteger('id_product');
            $table ->foreign('id_product')->references('id')->on('products');
            $table->unsignedBigInteger('id_shopping_cart');
            $table ->foreign('id_shopping_cart')->references('id')->on('shopping_carts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_shopping_carts');
    }
};
