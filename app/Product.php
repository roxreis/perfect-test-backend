<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Model
{
    protected $fillable = [
        'nameProduct', 
        'descriptionProduct', 
        'priceProduct', 
        'id', 
        'created_at', 
        'update_at', 
    ];


    public function sale(){
        
        return $this->hasOne(Sale::class, 'product_id', 'id');
        
    }
}
