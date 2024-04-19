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
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')
            ->references('id')
            ->on('vendors')
            ->onDelete('cascade');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('vendor_id')
            ->references('id')
            ->on('product_categories')
            ->onDelete('cascade');
            $table->string('title');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
            ->references('id')
            ->on('product_brands')
            ->onDelete('cascade');
            $table->unsignedBigInteger('measurement_unit_id');
            $table->foreign('measurement_unit_id')
            ->references('id')
            ->on('product_measurment_units')
            ->onDelete('cascade');
            $table->foreign('measurement_parameter_id')
            ->references('id')
            ->on('product_measurment_parameter')
            ->onDelete('cascade');
            $table->string('product_quantity');
            $table->string('product_price');
            





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_products');
    }
};
