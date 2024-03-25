<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public function product(){
        $this->hasMany(Product::class);
    }
    public function variation(){
        $this->hasMany(variation::class);
    }
}