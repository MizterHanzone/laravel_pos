<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table="products";

    protected $fillable = [
        'product_name',
        'category_id',
        'supplier_id',
        'quantity',
        'price_in',
        'price_out',
        'barcode',
        'barcode_image',
        'in_stock',
        'image',
    ];

    protected  $primaryKey = 'product_id';

}