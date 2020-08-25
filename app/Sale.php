<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Sale extends Model
{
   
    protected $table = "sales"; 
   
    protected $fillable = [
        'date_sale', 
        'quant_sale', 
        'deduction_sale',
        'statust_sale',
        'sale_id', 
        'name_product_sold',
        'sales_customer_id',
        'created_at', 
        'update_at', 
     
    ];

    

    public function customer(){
        return $this->belongsTo('App\Customer', 'sales_customer_id', 'customer_id');
        // para vincular a criacao do produto ao id da venda.
    }
    

    
}
