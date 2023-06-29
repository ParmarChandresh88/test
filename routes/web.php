<?php

use App\Http\Controllers\EcommerceController;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------------------------------------------------------/Admin Side-------------------------------------------------------------------------------

Route::get('/admin', function () {
    return view('admin.login');
});

Route::post('login',[EcommerceController::class,'login_admin']);
Route::get('category',[EcommerceController::class,'v_category'])->middleware('Protect');
Route::get('v_addcategory',[EcommerceController::class,'v_addcategory'])->middleware('Protect');
Route::post('addcategory',[EcommerceController::class,'addcategory'])->middleware('Protect');
Route::get('d_category/{id}',[EcommerceController::class,'delete_category'])->middleware('Protect');
Route::get('updates/{id}/{status}',[EcommerceController::class,'update_status'])->middleware('Protect');
Route::get('v_editcategory/{id}',[EcommerceController::class,'v_editcategory'])->middleware('Protect');
Route::post('u_category/{id}',[EcommerceController::class,'update_category'])->middleware('Protect');

// -------------------------------------ContactUs-------------------------------------------------
Route::get('v_contact',[EcommerceController::class,'v_contactus'])->middleware('Protect');
Route::get('d_contact/{id}',[EcommerceController::class,'delete_contact'])->middleware('Protect');

// -------------------------------------Product-------------------------------------------------
Route::get('v_product',[EcommerceController::class,'v_product'])->middleware('Protect');
Route::get('d_product/{id}',[EcommerceController::class,'delete_product'])->middleware('Protect');
Route::get('update/{id}/{status}',[EcommerceController::class,'updated_status'])->middleware('Protect');
Route::get('v_addproduct',[EcommerceController::class,'v_addproduct'])->middleware('Protect');
Route::post('addproduct',[EcommerceController::class,'add_product'])->middleware('Protect');
Route::get('v_editproduct/{id}',[EcommerceController::class,'v_editproduct'])->middleware('Protect');
Route::post('u_product/{id}',[EcommerceController::class,'update_product'])->middleware('Protect');

// -------------------------------------User Detail-------------------------------------------------
Route::get('v_user',[EcommerceController::class,'v_userdata'])->middleware('Protect');
Route::get('d_user/{id}',[EcommerceController::class,'delete_userdata'])->middleware('Protect');
Route::get('logout',[EcommerceController::class,'logout']);

//-------------------------------------------------------/User Side-------------------------------------------------------------------------------
// -------------------------------------category-------------------------------------------------

Route::get('/',[EcommerceController::class,'view_category']);
Route::get('cat_detail/{id}',[EcommerceController::class,'category_detail']);
Route::get('p_detail/{id}',[EcommerceController::class,'product_detail']);

// -------------------------------------contact_us-------------------------------------------------

Route::get('contactus',[EcommerceController::class,'contact_us']);
Route::post('add_detail',[EcommerceController::class,'contact_detail']);

// -------------------------------------User->login/logout-------------------------------------------------

Route::get('register',[EcommerceController::class,'register_login']);
Route::post('add_user',[EcommerceController::class,'user_register']);
Route::post('login_user',[EcommerceController::class,'user_login']);
Route::get('logout_user',[EcommerceController::class,'user_logout']);

// -------------------------------------Cart-------------------------------------------------

Route::get('v_cart/{id}',[EcommerceController::class,'view_cart']);
Route::post('add_cart/{id}',[EcommerceController::class,'add_cart']);
Route::get('d_cart/{id}',[EcommerceController::class,'delete_cart']);

// -------------------------------------CheckOut-------------------------------------------------

Route::get('v_checkout/{id}',[EcommerceController::class,'view_checkout']);
Route::get('d_checkout/{id}',[EcommerceController::class,'delete_checkout']);
Route::post('f_checkout',[EcommerceController::class,'form_checkout']);
Route::get('payment_update/{id}',[EcommerceController::class,'payment_update']);



