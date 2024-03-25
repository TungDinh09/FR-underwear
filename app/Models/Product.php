<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'quantity_of_stock'
    ];
    protected $table = "products";
    // public function category(){
    //     $this->belongTo(category::class);
    // }
}