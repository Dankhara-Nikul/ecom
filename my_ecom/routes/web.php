<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\FabricController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\PatternController;
use App\Http\Controllers\Admin\CollarController;


use App\Http\Controllers\Front\FrontController;
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


Route::view('/product1', 'product1');
Route::get('/',[FrontController::class,'index']);
Route::get('category/{id}',[FrontController::class,'category']);
Route::get('product/{id}',[FrontController::class,'product']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('search/{str}',[FrontController::class,'search']);
Route::get('registration',[FrontController::class,'registration']);
Route::post('registration_process',[FrontController::class,'registration_process'])->name('registration.registration_process');
Route::post('login_process',[FrontController::class,'login_process'])->name('login.login_process');
Route::get('logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    session()->forget('USER_TEMP_ID');
    return redirect('/');
});
Route::get('/verification/{id}',[FrontController::class,'email_verification']);
Route::post('forgot_password',[FrontController::class,'forgot_password']);
Route::get('/forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::post('apply_coupon_code',[FrontController::class,'apply_coupon_code']);
Route::post('remove_coupon_code',[FrontController::class,'remove_coupon_code']);
Route::post('place_order',[FrontController::class,'place_order']);
Route::get('/order_placed',[FrontController::class,'order_placed']);
Route::get('/order_fail',[FrontController::class,'order_fail']);
Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);

Route::post('product_review_process',[FrontController::class,'product_review_process']);

Route::group(['middleware'=>'user_auth'],function(){
    Route::get('/order',[FrontController::class,'order']);
    Route::get('/order_detail/{id}',[FrontController::class,'order_detail']);
});


Route::get('admin',[AdminController::class,'index']);
Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);
    
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);

    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/cousizepon/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);

    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);

    //Fabric

    Route::get('admin/fabric',[FabricController::class,'index']);
    Route::get('admin/fabric/manage_fabric',[FabricController::class,'manage_fabric']);
    Route::get('admin/fabric/manage_fabric/{id}',[FabricController::class,'manage_fabric']);
    Route::post('admin/fabric/manage_fabric_process',[FabricController::class,'manage_fabric_process'])->name('fabric.manage_fabric_process');
    Route::get('admin/fabric/delete/{id}',[FabricController::class,'delete']);
    Route::get('admin/fabric/status/{status}/{id}',[FabricController::class,'status']);

     //Type

     Route::get('admin/type',[TypeController::class,'index']);
     Route::get('admin/type/manage_type',[TypeController::class,'manage_type']);
     Route::get('admin/type/manage_type/{id}',[TypeController::class,'manage_type']);
     Route::post('admin/type/manage_type_process',[TypeController::class,'manage_type_process'])->name('type.manage_type_process');
     Route::get('admin/type/delete/{id}',[TypeController::class,'delete']);
     Route::get('admin/type/status/{status}/{id}',[TypeController::class,'status']);

     //Pattern

    Route::get('admin/pattern',[PatternController::class,'index']);
    Route::get('admin/pattern/manage_pattern',[PatternController::class,'manage_pattern']);
    Route::get('admin/pattern/manage_pattern/{id}',[PatternController::class,'manage_pattern']);
    Route::post('admin/pattern/manage_pattern_process',[PatternController::class,'manage_pattern_process'])->name('pattern.manage_pattern_process');
    Route::get('admin/pattern/delete/{id}',[PatternController::class,'delete']);
    Route::get('admin/pattern/status/{status}/{id}',[PatternController::class,'status']);

    //Collar

    Route::get('admin/collar',[CollarController::class,'index']);
    Route::get('admin/collar/manage_collar',[CollarController::class,'manage_collar']);
    Route::get('admin/collar/manage_collar/{id}',[CollarController::class,'manage_collar']);
    Route::post('admin/collar/manage_collar_process',[CollarController::class,'manage_collar_process'])->name('collar.manage_collar_process');
    Route::get('admin/collar/delete/{id}',[CollarController::class,'delete']);
    Route::get('admin/collar/status/{status}/{id}',[CollarController::class,'status']);


    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::view('admin/product/import_product','admin/import_product');
    Route::get('admin/product/import_product_upload',[ProductController::class,'import_product']);
    Route::get('admin/product/export_product',[ProductController::class,'export_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_producty_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);

    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
    Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'status']);

    Route::get('admin/tax',[TaxController::class,'index']);
    Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);
    Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('tax.manage_tax_process');
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);

    Route::get('admin/tax',[TaxController::class,'index']);
    Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);
    Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('tax.manage_tax_process');
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);

    Route::get('admin/customer',[CustomerController::class,'index']);
    Route::get('admin/customer/show/{id}',[CustomerController::class,'show']);
    Route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status']);


    Route::get('admin/home_banner',[HomeBannerController::class,'index']);
    Route::get('admin/home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
    Route::get('admin/home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
    Route::post('admin/home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
    Route::get('admin/home_banner/delete/{id}',[HomeBannerController::class,'delete']);
    Route::get('admin/home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);

    Route::get('admin/order',[OrderController::class,'index']);
    Route::get('admin/order_detail/{id}',[OrderController::class,'order_detail']);
    Route::get('admin/order_status/{id}',[OrderController::class,'order_status']);
    Route::post('admin/order_detail/{id}',[OrderController::class,'update_track_detail']);
    Route::get('admin/update_payemnt_status/{status}/{id}',[OrderController::class,'update_payemnt_status']);
    Route::get('admin/update_order_status/{status}/{id}',[OrderController::class,'update_order_status']);
    Route::get('admin/update_order_status1/{status}/{id}',[OrderController::class,'update_order_status1']);
    Route::get('admin/update_order_filter/{status}/{date}',[OrderController::class,'update_order_filter']);

    Route::get('admin/product_review',[ProductReviewController::class,'index']);
    Route::get('admin/update_product_review_status/{status}/{id}',[ProductReviewController::class,'update_product_review_status']);

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout sucessfully');
        return redirect('admin');
    });
});
