<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productbrand extends Model
{
    use HasFactory;
    protected $table="productbrands";

    public static function getProductBrandIdIndexedArray()
    {
      $records = self::all();
      $nameIdArr = [];
      foreach ($records as $record) {
        $nameIdArr[strtolower($record->name)] = $record->id;
      }
      return $nameIdArr;
    }
}
