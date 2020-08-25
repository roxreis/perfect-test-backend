<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    
    protected $table = "customers"; 
    
    protected $fillable = [
        'id_customer',
        'name_customer', 
        'cpf_customer',       
        'email_customer'       
    ];

    public function sale(){
        return $this->hasOne('App\Sale', 'customer_id', 'sales_customer_id');
         
    }
}
