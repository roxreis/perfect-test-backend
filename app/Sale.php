<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Sale extends Model
{
    protected $fillable = [
        'dateSale', 
        'quantSale', 
        'deductionSale',
        'statustSale',
        'id', 
        'created_at', 
        'update_at', 
        'user_id', 
        'user_name',
        'product_name'
    ];

    public function user(){
        return $this->belongsTo('App\User');
        // para vincular a criacao do produto ao id do usuario que o cadastrou.
    }

    public function product(){
        return $this->belongsTo('App\Product');
        // para vincular a criacao do produto ao id do usuario que o cadastrou.
    }
}
