<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get('/logout1', function () {
    Session::forget('admin');
    return redirect('login');
});
Route::get('/home',[HomeController::class,'index']);
Route::get("/login",[UserController::class,'login'])->middleware('userLogin');
Route::get("/register",[UserController::class,'register'])->middleware('userRegister');
Route::post("/login",[UserController::class,'loginUser'])->name('login-user')->middleware('userLogin');
Route::post("/register-user",[UserController::class,'registerUser'])->name('register-user')->middleware('userRegister');
Route::get('/listUser',[UserController::class,'index']);

Route::get('/addProduct',[ProductController::class,'create']);
Route::post('/addProduct',[ProductController::class,'store']);
Route::get('/',[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[SearchController::class,'SearchProduct']);
Route::get('/filter',[ProductController::class,'filter'] )->name('filter');
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow/{total}",[ProductController::class,'orderNow']);
Route::post("orderplace/{total}",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
// // admin---------------------------------------------------
// Route::get("/admin",[AdminController::class,'index'])->middleware('isLoggedin');
// Route::get("/admin",[AdminController::class,'index'])->middleware('isLoggedin');
// Route::get("/admin/edit/{id}",[AdminController::class,'edit']);
// Route::PATCH("/admin/update/{id}",[AdminController::class,'update']);
// Route::DELETE("/admin/delete/{id}",[AdminController::class,'destroy']);
// Route::get("/admin/product",[AdminController::class,'index_product']);
// Route::get("/admin/product_edit/{id}",[AdminController::class,'edit_product']);
// Route::PATCH("/admin/product_update/{id}",[AdminController::class,'update_product']);
// Route::DELETE("/admin/product_delete/{id}",[AdminController::class,'destroy_product']);
// // color----------------------------------------------------
// Route::get("/admin/color",[AdminController::class,'index_color']);
// Route::post("/admin/color_insert",[AdminController::class,'store_color']);
// Route::get("/admin/color_edit/{id}",[AdminController::class,'edit_color']);
// Route::PATCH("/admin/color_update/{id}",[AdminController::class,'update_color']);
// Route::DELETE("/admin/color_delete/{id}",[AdminController::class,'destroy_color']);
// // size----------------------------------------
// Route::get("/admin/size",[AdminController::class,'index_size']);
// Route::post("/admin/size_insert",[AdminController::class,'store_size']);
// Route::get("/admin/size_edit/{id}",[AdminController::class,'edit_size']);
// Route::PATCH("/admin/size_update/{id}",[AdminController::class,'update_size']);
// Route::DELETE("/admin/size_delete/{id}",[AdminController::class,'destroy_size']);
// // category------------------------------
// Route::get("/admin/category",[AdminController::class,'index_category']);
// Route::post("/admin/category_insert",[AdminController::class,'store_category']);
// Route::get("/admin/category_edit/{id}",[AdminController::class,'edit_category']);
// Route::PATCH("/admin/category_update/{id}",[AdminController::class,'update_category']);
// Route::DELETE("/admin/category_delete/{id}",[AdminController::class,'destroy_category']);
// // Shipping-------------------------------------------------------
// Route::get("/admin/shipping",[AdminController::class,'index_shipping']);
// Route::post("/admin/shipping_insert",[AdminController::class,'store_shipping']);
// Route::get("/admin/shipping_edit/{id}",[AdminController::class,'edit_shipping']);
// Route::PATCH("/admin/shipping_update/{id}",[AdminController::class,'update_shipping']);
// Route::DELETE("/admin/shipping_delete/{id}",[AdminController::class,'destroy_shipping']);
// //payment------------------------------------------------------------
// Route::get("/admin/payment",[AdminController::class,'index_payment']);
// Route::post("/admin/payment_insert",[AdminController::class,'store_payment']);
// Route::get("/admin/payment_edit/{id}",[AdminController::class,'edit_payment']);
// Route::PATCH("/admin/payment_update/{id}",[AdminController::class,'update_payment']);
// Route::DELETE("/admin/payment_delete/{id}",[AdminController::class,'destroy_payment']);
// //product_detail---------------------
// Route::get("/admin/product_detail/{id}",[ProductController::class,'detail_index']);
// Route::post("/admin/product_detail_insert/{id}",[ProductController::class,'detail_store']);
// Route::DELETE("/admin/product_detail_destroy/{id}",[ProductController::class,'detail_destroy']);
// //category--------------------
// Route::get("/product/category/{id}",[CategoryController::class,'selectCategory']);
// Route::get("/product/category/max",[CategoryController::class,'selectMaxToMin']);
// Route::get("/product/category/min",[CategoryController::class,'selectMinToMax']);
// // order----------------------------------
// Route::get("/admin/order",[AdminController::class,'index_order']);
// Route::DELETE("/admin/order_delete/{id}",[AdminController::class,'destroy_order']);

Route::group(['middleware'=>['isLoggedin']], function(){ // protectedPage1 la ten cua middleware da tao la fr day
    // copy cho toan bo route cua admin vao day
        // Route::view('users1','users1');
        // Route::get('/', function () {
        //     return view('welcome');
        // });
        // admin---------------------------------------------------
// Route::get("/admin",[AdminController::class,'index'])->middleware('isLoggedin');
Route::get("/admin",[AdminController::class,'index']);
Route::get("/admin/edit/{id}",[AdminController::class,'edit']);
Route::PATCH("/admin/update/{id}",[AdminController::class,'update']);
Route::DELETE("/admin/delete/{id}",[AdminController::class,'destroy']);
Route::get("/admin/product",[AdminController::class,'index_product']);
Route::get("/admin/product_edit/{id}",[AdminController::class,'edit_product']);
Route::PATCH("/admin/product_update/{id}",[AdminController::class,'update_product']);
Route::DELETE("/admin/product_delete/{id}",[AdminController::class,'destroy_product']);
// color----------------------------------------------------
Route::get("/admin/color",[AdminController::class,'index_color']);
Route::post("/admin/color_insert",[AdminController::class,'store_color']);
Route::get("/admin/color_edit/{id}",[AdminController::class,'edit_color']);
Route::PATCH("/admin/color_update/{id}",[AdminController::class,'update_color']);
Route::DELETE("/admin/color_delete/{id}",[AdminController::class,'destroy_color']);
// size----------------------------------------
Route::get("/admin/size",[AdminController::class,'index_size']);
Route::post("/admin/size_insert",[AdminController::class,'store_size']);
Route::get("/admin/size_edit/{id}",[AdminController::class,'edit_size']);
Route::PATCH("/admin/size_update/{id}",[AdminController::class,'update_size']);
Route::DELETE("/admin/size_delete/{id}",[AdminController::class,'destroy_size']);
// category------------------------------
Route::get("/admin/category",[AdminController::class,'index_category']);
Route::post("/admin/category_insert",[AdminController::class,'store_category']);
Route::get("/admin/category_edit/{id}",[AdminController::class,'edit_category']);
Route::PATCH("/admin/category_update/{id}",[AdminController::class,'update_category']);
Route::DELETE("/admin/category_delete/{id}",[AdminController::class,'destroy_category']);
// Shipping-------------------------------------------------------
Route::get("/admin/shipping",[AdminController::class,'index_shipping']);
Route::post("/admin/shipping_insert",[AdminController::class,'store_shipping']);
Route::get("/admin/shipping_edit/{id}",[AdminController::class,'edit_shipping']);
Route::PATCH("/admin/shipping_update/{id}",[AdminController::class,'update_shipping']);
Route::DELETE("/admin/shipping_delete/{id}",[AdminController::class,'destroy_shipping']);
//payment------------------------------------------------------------
Route::get("/admin/payment",[AdminController::class,'index_payment']);
Route::post("/admin/payment_insert",[AdminController::class,'store_payment']);
Route::get("/admin/payment_edit/{id}",[AdminController::class,'edit_payment']);
Route::PATCH("/admin/payment_update/{id}",[AdminController::class,'update_payment']);
Route::DELETE("/admin/payment_delete/{id}",[AdminController::class,'destroy_payment']);
//product_detail---------------------
Route::get("/admin/product_detail/{id}",[ProductController::class,'detail_index']);
Route::post("/admin/product_detail_insert/{id}",[ProductController::class,'detail_store']);
Route::DELETE("/admin/product_detail_destroy/{detail_id}",[ProductController::class,'detail_destroy']);
//category--------------------
Route::get("/product/category/{id}",[CategoryController::class,'selectCategory']);
Route::get("/product/category/max",[CategoryController::class,'selectMaxToMin']);
Route::get("/product/category/min",[CategoryController::class,'selectMinToMax']);
// order----------------------------------
Route::get("/admin/order",[AdminController::class,'index_order']);
Route::DELETE("/admin/order_delete/{id}",[AdminController::class,'destroy_order']);
        


 



    
} );