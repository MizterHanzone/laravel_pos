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
        Schema::create('orderitem', function (Blueprint $table) {
            $table->id('orderitem_id');
            $table->decimal('order_price', 8, 4);
            $table->integer('order_quantity')->default(1);
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitem');
    }
};
