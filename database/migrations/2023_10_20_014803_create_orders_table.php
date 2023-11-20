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
            $table->string('name')->nullable;
            $table->string('email')->nullable;
            $table->integer('phone')->nullable;
            $table->string('address')->nullable;
            $table->string('user_id')->nullable;

            $table->string('category_name')->nullable;
            $table->string('product_name')->nullable;
            $table->string('size')->nullable;
            $table->string('price')->nullable;
            $table->string('order_quantity')->nullable;
            $table->string('product_id')->nullable;
            $table->string('image')->nullable;
            $table->string('instructions')->nullable;

            $table->string('QR_reference')->nullable;
            $table->string('payment_status')->nullable;
            $table->string('order_status')->nullable;
            $table->string('delivery_mode')->nullable;
            $table->string('delivery_date')->nullable;
            $table->string('delivery_time')->nullable;
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
