<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Shipping;
use App\Models\payment_type;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("/admin", compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('update_user',compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->is_admin = $request->admin;
        $user->save();
        return redirect("/admin");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return  redirect("/admin");
    
    }
    public function index_product()
    {
        $products = Product::all();
        return view("/admin_product", compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit_product(string $id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('update_product',compact("products","categories"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_product(Request $request, string $id)
    {
        $photo1 = $request->file('image1')->getClientOriginalName();
        $request->file('image1')->storeAs('public/photos',$photo1);

        $photo2 = $request->file('image2')->getClientOriginalName();
        $request->file('image2')->storeAs('public/photos',$photo2);

        $photo3 = $request->file('image3')->getClientOriginalName();
        $request->file('image3')->storeAs('public/photos',$photo3);

        $photo4 = $request->file('image4')->getClientOriginalName();
        $request->file('image4')->storeAs('public/photos',$photo4);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->photo1 = $photo1;
        $product->photo2 = $photo2;
        $product->photo3 = $photo3;
        $product->photo4 = $photo4;
        $product->save();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_product(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return  redirect()->action([AdminController::class,'index_product'])->with('dữ liệu xóa thành công.');
    }
    //COLOR________________________________-
    public function index_color()
    {
        $colors = Color::all();
        return view("/admin_color", compact('colors'));
    }
    public function store_color(Request $request)
    {   $request->validate([
            'color'=>'required',
        ]);
        $colors = new Color;
        $colors->color = $request->color;
        $colors->save();
        return redirect("/admin/color");

    }
    public function edit_color(string $id)
    {
        $color = Color::findOrFail($id);
        return view('update_color',compact("color"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_color(Request $request, string $id)
    {

        $color = Color::find($id);
        $color->color = $request->color;      
        $color->save();
        return redirect("/admin/color");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_color(string $id)
    {
        $color = Color::find($id);
        $color->delete();
        return  redirect()->action([AdminController::class,'index_color'])->with('dữ liệu xóa thành công.');
    }
    //SIZE--------------------------
    public function index_size()
    {
        $sizes = Size::all();
        return view("/admin_size", compact('sizes'));
    }
    public function store_size(Request $request)
    {   $request->validate([
            'size'=>'required',
        ]);
        $sizes = new Size;
        $sizes->size = $request->size;
        $sizes->save();
        return redirect("/admin/size")->with('success','Add successfully');

    }
    public function edit_size(string $id)
    {
        $size = Size::findOrFail($id);
        return view('update_size',compact("size"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_size(Request $request, string $id)
    {

        $size = Size::find($id);
        $size->size = $request->size;      
        $size->save();
        return redirect("/admin/size");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_size(string $id)
    {
        $size = Size::find($id);
        $size->delete();
        return  redirect()->action([AdminController::class,'index_size'])->with('dữ liệu xóa thành công.');
    }
    //category-----------------------
    public function index_category()
    {
        $categories = Category::all();
        return view("/admin_category", compact('categories'));
    }
    public function store_category(Request $request)
    {   $request->validate([
            'name'=>'required',
        ]);
        $categories = new category;
        $categories->name = $request->name;
        $categories->save();
        return redirect("/admin/category")->with('success','Add successfully');;

    }
    public function edit_category(string $id)
    {
        $category = Category::findOrFail($id);
        return view('update_category',compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_category(Request $request, string $id)
    {

        $category = Category::find($id);
        $category->name = $request->name;      
        $category->save();
        return redirect("/admin/category");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_category(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return  redirect()->action([AdminController::class,'index_category'])->with('dữ liệu xóa thành công.');
    }
    // payment--------------------------------------
    public function index_payment()
    {
        $payments = payment_type::all();
        return view("/admin_payment", compact('payments'));
    }
    public function store_payment(Request $request)
    {   $request->validate([
            'name'=>'required',
        ]);
        $payments = new payment_type;
        $payments->name = $request->name;
        $payments->save();
        return redirect("/admin/payment")->with('success','Add successfully');;

    }
    public function edit_payment(string $id)
    {
        $payment = payment_type::findOrFail($id);
        return view('update_payment',compact("payment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_payment(Request $request, string $id)
    {

        $payment = payment_type::find($id);
        $payment->name = $request->name;      
        
        $payment->save();
        return redirect("/admin/payment");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_payment(string $id)
    {
        $payment = payment_type::find($id);
        $payment->delete();
        return  redirect()->action([AdminController::class,'index_payment'])->with('dữ liệu xóa thành công.');
    }
    //Shipping------------------------------------------------------
    public function index_shipping()
    {   
        
        $shippings = shipping::all();
        $row = count($shippings);
        return view("/admin_shipping", compact('shippings','row'));
    }
    public function store_shipping(Request $request)
    {   
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $shippings = new shipping;
        $shippings->name = $request->name;
        $shippings->price = $request->price;
        $shippings->save();
        return redirect("/admin/shipping")->with('success','Add successfully');;

    }
    public function edit_shipping(string $id)
    {
        $shipping = shipping::findOrFail($id);
        return view('update_shipping',compact("shipping"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_shipping(Request $request, string $id)
    {

        $shipping = shipping::find($id);
        $shipping->name = $request->name;  
        $shipping->price = $request->price;    
        $shipping->save();
        return redirect("/admin/shipping");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_shipping(string $id)
    {
        $shipping = shipping::find($id);
        $shipping->delete();
        return  redirect()->action([AdminController::class,'index_shipping'])->with('dữ liệu xóa thành công.');
    }
}