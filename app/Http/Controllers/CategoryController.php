<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function admincategory()
    {
    return view('/admin/addcategory');
}
    public function addCategory()
    {
        $category = [
            ['name' => 'Panties'],
            ['name' => 'Swimsuit'],
            ['name' => 'Bra']
        ];
        Category::insert($category);
        return "category added successfully";
    }
    public function index()
    {
        $data = Category::all();
        return view('addProduct', ['categories' => $data]);
    }
    // public function addVariation()
    // {
    //     $variation = [
    //         ['name' => 'Size'],
    //         ['name' => 'Color'],
    //         ['name' => 'Banner']
    //     ];
    //     Category::insert($variation);
    //     return "variation added successfully";
    // }
}
