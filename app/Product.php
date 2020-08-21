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
        'user_id', 
        'user_name'];


    public function user(){
        return $this->belongsTo('App\User');
        // para vincular a criacao do produto ao id do usuario que o cadastrou.
    }
}
