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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table -> date('order_date');
            $table -> integer('total_price');
            $table -> string('state_order');
            $table->unsignedBigInteger('id_user');
            $table ->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_payment_method');
            $table ->foreign('id_payment_method')->references('id')->on('payment_methods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
