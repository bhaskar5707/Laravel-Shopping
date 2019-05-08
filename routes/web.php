<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::match(['get','post'],'/admin','AdminController@login');
//Route::get('/admin/dashboard','AdminController@dashboard'); //work with session logout


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Home page
Route::get('/','IndexController@index');

//Listing category Page
Route::get('/products/{url}','ProductsController@products');
Route::get('/brands/{url}','ProductsController@product_brands');
//Product detail
Route::get('/product/{id}','ProductsController@product');
//Get 	product attribute price
Route::get('/get-product-price','ProductsController@getProductPrice');


//Add to cart route
Route::match(['get','post'],'/add-cart','ProductsController@addtocart');
//cart route
Route::match(['get','post'],'/cart','ProductsController@cart');
//Delete cart items
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

//Update product qunatity
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//Apply coupon code
Route::post('cart/apply-coupon/','ProductsController@applyCoupon');


//Registration And Login
Route::get('/login-register','UsersController@userLoginRegister');
//User register form submit
//Route::get('/user-register','UsersController@register');
Route::match(['get','post'],'/user-register','UsersController@register');
//Logout
Route::get('/user-logout','UsersController@logout');
//Check if user already exists
Route::match(['get','post'],'/check-email','UsersController@checkEmail');
Route::post('user-login','UsersController@login');

//All Routes after login
Route::group(['middleware'=>['frontlogin']],function()
{
	//User account route
    Route::match(['get','post'],'/account','UsersController@account');
    //Check current password
    Route::get('/check-user-pwd','UsersController@chkUserPassword');
    //Update user password
    Route::post('/update-user-pwd','UsersController@updatePassword');
    //Checkout page
    Route::match(['get','post'],'/checkout','ProductsController@checkout');
    //Order review page
    Route::match(['get','post'],'/order-review','ProductsController@orderReview');
    //Place order
    Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
    //Thanku page
    Route::get('/thanks','ProductsController@thanks');
    //Paypal page
    Route::get('/paypal','ProductsController@paypal');
    //My order
    Route::get('/orders','ProductsController@userOrders');
    //User order products page
    Route::get('/orders/{id}','ProductsController@userOrderDetails');
    //Paypal thanks page
    Route::get('/paypal/thanks','ProductsController@thanksPaypal');
    //Paypal cancel page
    Route::get('/paypal/cancel','ProductsController@cancelPaypal');
});



//Admin Root
Route::group(['middleware'=>['adminlogin']],function()
{
   Route::get('/admin/dashboard','AdminController@dashboard');
   Route::get('/admin/settings','AdminController@settings');
   Route::get('/admin/check-pwd','AdminController@chkPassword');
   Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

   //category route(admin)
   Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
   Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
   Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
   Route::get('/admin/view-categories','CategoryController@viewCategories');

  //brand route(admin)
  Route::get('/admin/view-brands','BrandController@viewBrands');
  Route::get('/admin/addbrand', 'BrandController@addBrand');
  Route::get('/admin/updatebrand', 'BrandController@updateBrand');
  Route::get('/view-all-brands','BrandController@getAllBrands');
  Route::get('/admin/delete-brand', 'BrandController@deleteBrand');

  //Tree Structure
  Route::get('/admin/category-tree-view','CategoryController@manageCategoryStructure');

   //Product Routes
   Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
   Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
   Route::get('/admin/view-products','ProductsController@viewProducts');
   Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@deleteProduct');
   Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');





   //Product attributes
   Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
   Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');
   Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
   Route::match(['get','post'],'/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
   Route::match(['get','post'],'/admin/delete-alternate-image/{id}','ProductsController@deleteAddImage');

   // Coupon Routes
   Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
   Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
   Route::get('/admin/view-coupons','CouponsController@viewCoupons');
   Route::match(['get','post'],'/admin/delete-coupon/{id}','CouponsController@deleteCoupon');

   //Banner Routes
   Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
   Route::get('/admin/view-banner','BannersController@viewBanners');
   Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
   Route::match(['get','post'],'/admin/delete-banner/{id}','BannersController@deleteBanner');

   //Admin order route
   Route::get('/admin/view-orders','ProductsController@viewOrders');
   //Admin order detail page
   Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');
   //Update order status  
   Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

   //Admin User Route
   Route::get('/admin/view-users','UsersController@viewUsers');

});

Route::get('/logout','AdminController@logout');

//Search Route
Route::post('/search-products','ProductsController@searchProducts');
Route::get('/grogery-and-staples','ProductsController@groceryAndStaples');
Route::get('/user-comment','ProductsController@getComment');


