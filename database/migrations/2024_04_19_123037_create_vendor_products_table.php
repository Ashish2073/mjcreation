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

        Schema::create('vendors',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('product_brands',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('brand_logo');
            $table->timestamps();
        });

        Schema::create('product_measurment_units',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('product_measurment_parameters',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();

        });




        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')
            ->references('id')
            ->on('vendors')
            ->onDelete('cascade');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')
            ->references('id')
            ->on('product_categories')
            ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
            ->references('id')
            ->on('product_brands')
            ->onDelete('cascade');
            $table->string('product_quantity')->nullable();
            $table->longText('discription')->nullable();
            $table->string('measurement_parameter_name')->nullable();
            $table->string('measurement_unit_name')->nullable();
            $table->longText('product_price_detail')->nullable();
            $table->longText('product_other_expenditure_cost')->nullable();
            $table->longText('product_specification')->nullable();
            $table->longText('product_discount_detail')->nullable();
            $table->string('product_banner_image')->nullable();
            $table->longText('product_image_gallery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
        Schema::dropIfExists('product_brands');
        Schema::dropIfExists('product_measurment_units'); 
        Schema::dropIfExists('product_measurment_parameters');
        Schema::dropIfExists('vendor_products');
    }
};
