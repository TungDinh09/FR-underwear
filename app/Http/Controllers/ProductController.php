<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\order_line;
use App\Models\shop_order;
use App\Models\color;
use App\Models\size;
use App\Models\payment_type;
use App\Models\shipping;
use App\Models\Category;
use App\Models\product_detail;
use App\Models\User;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function create(){
        $data = Category::all();
        return view('addProduct',['categories'=>$data]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
           'price'=>'required',
           'category_id'=>'required',
           'description'=>'required',
            
            'image1'=>'required',
            'image2'=>'required',
            'image3'=>'required',
            'image4'=>'required',
        ]);
        $photo1 = $request->file('image1')->getClientOriginalName();
        $request->file('image1')->storeAs('public/photos', $photo1);

        $photo2 = $request->file('image2')->getClientOriginalName();
        $request->file('image2')->storeAs('public/photos', $photo2);

        $photo3 = $request->file('image3')->getClientOriginalName();
        $request->file('image3')->storeAs('public/photos', $photo3);

        $photo4 = $request->file('image4')->getClientOriginalName();
        $request->file('image4')->storeAs('public/photos', $photo4);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->photo1 = $photo1;
        $product->photo2 = $photo2;
        $product->photo3 = $photo3;
        $product->photo4 = $photo4;
        $product->save();
        return redirect("/addProduct");
    }
    public function detail_index($id)
    {
        $colors = color::all();
        $sizes = size::all();
        $product_details = DB::table('product_details')
            ->select('products.*', 'product_details.*','product_details.id as detail_id')
            ->join('products', 'product_details.product_id', '=', 'products.id')
            ->where('product_details.product_id','=', $id)
            ->get();
        
        return view('/admin_product_detail', compact('product_details','colors','sizes','id'));
    }
    
    public function detail_store(Request $request , $id)
    {
        $detail = new product_detail;
        $detail->product_id = $id;
        $detail->color_id = $request->color_id;
        $detail->size_id = $request->size_id;
        $detail->save();
        return redirect("/admin/product_detail/$id");
    }
    public function detail_destroy($detail_id)
    {
       $detail = product_detail::find($detail_id);
       $id = $detail->product_id;
        $detail->delete();
        return  redirect("/admin/product_detail/$id");
    }
    function detail($id)
    {          
        $colors = color::all();
        $sizes = size::all();
        $product_details = DB::table('product_details')
            ->select('products.*', 'product_details.*')
            ->join('products', 'product_details.product_id', '=', 'products.id')
            ->where('product_details.product_id','=', $id)
            ->get();
        return view('detail', ['product_details' => $product_details,'colors'=> $colors, 'sizes'=> $sizes]);
        
    }
    function search(Request $req)
    {
        $products = Product::where('name', 'like', '%' . $req->input('query') . '%')
            ->get();
        
        return view('product', compact('products'));
    }
    public function addToCart(Request $req)
    {
        $req->validate([
            'product_detail_id'=>'required'
        ]);
        if ($req->session()->has('user')) {
            $userId = $req->session()->get('user')['id'];
            $product_d_Id = $req->product_detail_id;

            $cart = Cart::where('user_id', $userId)
                ->where('product_detail_id', $product_d_Id)
                ->first();
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_detail_id = $req->product_detail_id;
            $cart->quantity = $req->quantity;
           
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    public function cartList()
    {   
        if(Session('user')){
            $userId = Session::get('user')['id'];
        }elseif(Session('admin')){
            $users = User::all();
            return view("/admin", compact('users'));
        }
        
        $products = DB::table('carts')
        ->select('product_details.*','carts.id as cart_id','products.*','carts.*')
        ->join('product_details','carts.product_detail_id','product_details.id')
        ->join('products','product_details.product_id','products.id')
        ->where('carts.user_id', $userId)
        ->get();
    return view('cartlist', compact('products'));
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow($total)
    {
        $shippings = shipping::all();
        $payments = payment_type::all();
        
        $userId = Session::get('user')['id'];
        

        return view('/ordernow', ['total' => $total,'shippings'=> $shippings, 'payments'=>$payments]);
        // return $total;
    }
    function orderPlace(Request $req, $total)
    {
        $req->validate([
            'address'=>'required'
        ]);
        $s_orders = shop_order::all();
        $i = 1;
        foreach($s_orders as $s_order){
            if($s_order->id != $i){
                break;
            }
            $i++;
        }
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            
            // shop order
            $shop_order = new shop_order;
            $shop_order->id = $i;
            $shop_order->user_id = $cart['user_id'];
            $shop_order->shipping_method_id =$req->shipping;
            $shipping_price = DB::table('shippings')->where('id', $req->shipping)->get('price')[0]->price;
            $shop_order->payment_type_id =$req->payment;
            
            $shop_order->order_total =  $total + $shipping_price; 
            $shop_order->address = $req->address;
            $shop_order->save();
        
            
            
                 
            //order line--------
            // $products = DB::table('carts')
            // ->select('product_details.*', 'carts.*','products.*')
            // ->join('product_details', 'carts.product_detail_id', '=', 'product_details.id')
            // ->where('carts.user_id', $userId, 'and', )
            // ->get();


            
            $order_line = new order_line;
            $order_line->order_id = $i;
            $order_line->product_detail_id = $cart['product_detail_id'];
            $order_line->quantity = $cart['quantity'];
            $order_line->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    function myOrders()
    {
        $userId = Session::get('user')['id'];
        $orders_lines = DB::table('products')
            ->join('product_details', 'product_details.product_id', '=', 'products.id')
            ->join('order_lines', 'order_lines.product_detail_id', '=', 'product_details.id')
            ->join('shop_orders', 'order_lines.order_id', '=', 'shop_orders.id')
            ->where('shop_orders.user_id', '=',$userId)
            ->get();

        return view('myorders',['orders_lines'=>$orders_lines]);
        // return $orders_lines;
    }
    
}