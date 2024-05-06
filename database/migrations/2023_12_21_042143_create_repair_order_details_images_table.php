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
        Schema::create('repair_order_details_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_order_details_id');
            $table->text('image');
            $table->foreign('repair_order_details_id')->references('id')->on('repair_order_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_order_details_images');
    }
};
