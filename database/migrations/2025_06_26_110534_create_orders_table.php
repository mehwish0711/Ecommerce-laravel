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
            $table->unsignedBigInteger('customer_id');
             $table->foreign('customer_id')->references('id')->on('frontend_users')->onDelete('cascade');
            $table->decimal('bill', 10, 2)->default(0);
            $table->string('status')->default('pending');
            $table->string('fullname');
            $table->text('address');
            $table->string('phone');
            
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
