<?php

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


use App\Http\Controllers\HomeController;
//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');
Route::post('/autocomplete-ajax','App\Http\Controllers\HomeController@autocomplete_ajax');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{slug_category_product}','App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_slug}','App\Http\Controllers\BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@details_product');
Route::get('/tag/{product_tag}','App\Http\Controllers\ProductController@tag');

//Backend
//Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/admin','App\Http\Controllers\AuthController@login_auth');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

Route::post('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');
Route::get('/order-date','App\Http\Controllers\AdminController@order_date');
Route::post('/days-order','App\Http\Controllers\AdminController@days_order');
Route::post('/dashboard-filter','App\Http\Controllers\AdminController@dashboard_filter');

//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');

Route::post('/export-csv','App\Http\Controllers\CategoryProduct@export_csv');
Route::post('/import-csv','App\Http\Controllers\CategoryProduct@import_csv');

Route::post('/quickview','App\Http\Controllers\ProductController@quickview');
Route::post('/product-tabs','App\Http\Controllers\CategoryProduct@product_tabs');

Route::post('/arrange-category','App\Http\Controllers\CategoryProduct@arrange_category');

//Send Mail
Route::get('/send-mail','App\Http\Controllers\HomeController@send_mail');

//Login facebook
Route::get('/login-facebook','App\Http\Controllers\AdminController@login_facebook');
Route::get('/admin/callback','App\Http\Controllers\AdminController@callback_facebook');

//Login  google
Route::get('/login-google','App\Http\Controllers\AdminController@login_google');
Route::get('/google/callback','App\Http\Controllers\AdminController@callback_google');


//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::group(['middleware' => 'auth.roles'],function ()
{
	Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
	Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
});



Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product'); 


//Ex-Import Data
Route::post('/export-csv-product','App\Http\Controllers\ProductController@export_csv_product');
Route::post('/import-csv-product','App\Http\Controllers\ProductController@import_csv_product');

//Comment
Route::post('/load-comment','App\Http\Controllers\ProductController@load_comment');
Route::post('/send-comment','App\Http\Controllers\ProductController@send_comment');
Route::get('/comment','App\Http\Controllers\ProductController@list_comment');
Route::post('/allow-comment','App\Http\Controllers\ProductController@allow_comment');
Route::post('/reply-comment','App\Http\Controllers\ProductController@reply_comment');
Route::post('/insert-rating','App\Http\Controllers\ProductController@insert_rating');

//CK Editor
Route::post('/uploads-ckeditor','App\Http\Controllers\ProductController@ckeditor_image');
Route::get('/file-browser','App\Http\Controllers\ProductController@file_browser');

//Users
Route::get('/add-users','App\Http\Controllers\UserController@add_users')->middleware('auth.roles');
Route::post('/store-users','App\Http\Controllers\UserController@store_users');

// Route::get('users',
// 		[
// 			'uses'=>'App\Http\Controllers\UserController@index',
// 			'as'=> 'Users',
// 			//'middleware'=> 'roles'
// 			// 'roles' => ['admin','author']
// 		]);

Route::get('/users','App\Http\Controllers\UserController@index')->middleware('auth.roles');
Route::post('assign-roles','App\Http\Controllers\UserController@assign_roles')->middleware('auth.roles');
Route::get('/delete-user-roles/{admin_id}','App\Http\Controllers\UserController@delete_user_roles')->middleware('auth.roles');
Route::get('/impersonate/{admin_id}','App\Http\Controllers\UserController@impersonate');
Route::get('/impersonate-destroy','App\Http\Controllers\UserController@impersonate_destroy');



//Cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/gio-hang','App\Http\Controllers\CartController@gio_hang');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::get('/del-product/{session_id}','App\Http\Controllers\CartController@del_product');
Route::get('/del-all-product','App\Http\Controllers\CartController@del_all_product');

//Coupon
Route::post('/check-coupon','App\Http\Controllers\CartController@check_coupon');

//Coupon Admin
Route::get('/insert-coupon','App\Http\Controllers\CouponController@insert_coupon');
Route::post('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/list-coupon','App\Http\Controllers\CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}','App\Http\Controllers\CouponController@delete_coupon');
Route::get('/unset-coupon','App\Http\Controllers\CouponController@unset_coupon');



//Checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/select-delivery-home','App\Http\Controllers\CheckoutController@select_delivery_home');
Route::post('/calculate-fee','App\Http\Controllers\CheckoutController@calculate_fee');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::get('/del-fee','App\Http\Controllers\CheckoutController@del_fee');
Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');



//Order
// Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
// Route::get('/view-order/{orderId}','App\Http\Controllers\CheckoutController@view_order');
Route::get('/view-history-order/{order_code}','App\Http\Controllers\OrderController@view_history_order');
Route::get('/history','App\Http\Controllers\OrderController@history');

Route::get('/delete-order/{order_code}','App\Http\Controllers\OrderController@delete_order');
Route::get('/manage-order','App\Http\Controllers\OrderController@manage_order');
Route::get('/print-order/{checkout_code}','App\Http\Controllers\OrderController@print_order');
Route::get('/view-order/{order_code}','App\Http\Controllers\OrderController@view_order');

Route::post('/update-order-qty','App\Http\Controllers\OrderController@update_order_qty');
Route::post('/update-qty','App\Http\Controllers\OrderController@update_qty');


//Delivery
Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');

//Banner
Route::get('/manage-slider','App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider','App\Http\Controllers\SliderController@add_slider');
Route::post('/insert-slider','App\Http\Controllers\SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');
Route::get('/delete-slide/{slide_id}','App\Http\Controllers\SliderController@delete_slide');


//Authentication roles

Route::get('/register-auth','App\Http\Controllers\AuthController@register_auth');
Route::post('/register','App\Http\Controllers\AuthController@register');
Route::get('/login-auth','App\Http\Controllers\AuthController@login_auth');
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::get('/logout-auth','App\Http\Controllers\AuthController@logout_auth');


//Gallery
Route::get('add-gallery/{product_id}','App\Http\Controllers\GalleryController@add_gallery');
Route::post('select-gallery','App\Http\Controllers\GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','App\Http\Controllers\GalleryController@insert_gallery');
Route::post('update-gallery-name','App\Http\Controllers\GalleryController@update_gallery_name');
Route::post('delete-gallery','App\Http\Controllers\GalleryController@delete_gallery');
Route::post('update-gallery','App\Http\Controllers\GalleryController@update_gallery');

//Document
Route::get('upload_file','App\Http\Controllers\DocumentController@upload_file');
Route::get('upload_image','App\Http\Controllers\DocumentController@upload_image');
Route::get('upload_video','App\Http\Controllers\DocumentController@upload_video');
Route::get('download_document/{path}/{name}','App\Http\Controllers\DocumentController@download_document');
Route::get('create_document','App\Http\Controllers\DocumentController@create_document');

Route::get('delete_document/{path}','App\Http\Controllers\DocumentController@delete_document');

//Folder
Route::get('create_folder','App\Http\Controllers\DocumentController@create_folder');
Route::get('rename_folder','App\Http\Controllers\DocumentController@rename_folder');
Route::get('delete_folder','App\Http\Controllers\DocumentController@delete_folder');

Route::get('list_document','App\Http\Controllers\DocumentController@list_document');
Route::get('read_data','App\Http\Controllers\DocumentController@read_data');

//Send Mail 
// Route::get('/send-coupon-vip/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','App\Http\Controllers\MailController@send_coupon_vip');
// Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','App\Http\Controllers\MailController@send_coupon');

// Route::get('/mail-example','App\Http\Controllers\MailController@mail_example');

// Route::get('/send-mail','App\Http\Controllers\MailController@send_mail');
Route::get('/quen-mat-khau','App\Http\Controllers\MailController@quen_mat_khau');
Route::get('/update-new-pass','App\Http\Controllers\MailController@update_new_pass');
Route::post('/recover-pass','App\Http\Controllers\MailController@recover_pass');
Route::post('/reset-new-pass','App\Http\Controllers\MailController@reset_new_pass');
Route::get('/send-coupon','App\Http\Controllers\MailController@send_coupon');

//login customer by google
Route::get('/login-customer-google','App\Http\Controllers\AdminController@login_customer_google');
Route::get('/customer/google/callback','App\Http\Controllers\AdminController@callback_customer_google');

//login customer by facebook
Route::get('/login-facebook-customer','App\Http\Controllers\AdminController@login_facebook_customer');
Route::get('/customer/facebook/callback','App\Http\Controllers\AdminController@callback_facebook_customer');