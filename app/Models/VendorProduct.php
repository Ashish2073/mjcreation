<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;
    protected $table="vendor_products";

    protected $fillable = [
        'vendor_id',
        'product_category_id',
        'product_title',
        'brand_id', 
        'product_quanty',
        'discription',
        'product_warrenty',
        'measurement_parameter_name',
        'measurement_unit_name',
        'product_mesurment_quantity',
        'product_quantity_price',
        'product_currency_type',
        'product_other_expenditure_cost',
        'product_other_expenditure_currency_type',
        'product_other_expenditure_resaon',
        'product_specification_heading',
        'product_specification',
        'product_specification_details',
        'product_discount_name',
        'product_discount_percentage',
        'product_discount_start_date',
        'product_discount_end_date',
        'product_discount_detail',
        'product_banner_image',
        'product_image_gallery',
        'product_color_image_gallery',
        'product_color_banner_image',
        'product_color_image_gallery'



    ];
}
