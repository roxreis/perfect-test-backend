<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Model
{
   
    protected $table = "products"; 
   
    protected $fillable = [
        'name_product', 
        'description_product', 
        'price_Product', 
        'product_id',
        'image_product', 
        'created_at', 
        'update_at', 
    ];

    public function saleProduct(){
        return $this->hasOne('App\Sale', 'product_id', 'sales_product_id');
        
    }


}
