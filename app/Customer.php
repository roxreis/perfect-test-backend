<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_id', 
        'customer_name', 
        'customer_cpf',       
        'customer_email',       
    ];
}
