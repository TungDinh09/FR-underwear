<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchProduct(Request $request)
    {
        if ($request->search) {
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('/product', compact('products'));
        }
        elseif($request->search == null) {
            $products = Product::all();
            return view('/product', compact('products'));
        }else{
            $products = DB::table('products')->select('*');
            $producst = $products->get();
            return view('/product', compact('products'));
        }
        if (condition) {
            # code...
        } else {
            # code...
        }
        
      
    }
}
