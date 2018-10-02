<?php
//..................................................................
//Front End Routes...............................................
Route::get('/', 'HomeController@index');
//Products By Category
Route::get('/product_by_category/{category_id}', 'HomeController@categorised_products');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@manufactured_products');
Route::get('/view-product/{product_id}', 'HomeController@product_details');

//CART MANAGEMENT
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{rowId}','CartController@delete_to_cart');
Route::get('/update-cart','CartController@update_cart');

//WishList
// Route::get('/show-wishlist','CartController@show_wishlist');
// Route::get('/add-to-wishlist/{product_id}','CartController@add_to_wishlist');

//Checkout Management
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
//Login Check


//.........................................................................
//Admin Authentication Routes..............................................
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');




//Category Controller.....................................................
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');

Route::get('/inactive-category/{category_id}', 'CategoryController@inactive_category');
Route::get('/active-category/{category_id}', 'CategoryController@active_category');

Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');



//Manufacture Controller.....................................................
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all-manufacture','ManufactureController@all_manufacture');

Route::get('/inactive-manufacture/{manufacture_id}','ManufactureController@inactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');

Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');


//Product Controller...........................................................
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/inactive-product/{product_id}', 'ProductController@inactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::post('/update-stock-product/{product_id}', 'ProductController@update_stock_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');


//Slider Controller.............................................................
Route::get('/add-slider', 'SliderController@index');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/all-slider', 'SliderController@all_slider');

Route::get('/inactive-slider/{slider_id}', 'SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}', 'SliderController@active_slider');

Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');


//