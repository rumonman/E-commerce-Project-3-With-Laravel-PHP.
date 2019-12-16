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
Route::get('/', 'PagesController@index')->name('home');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/search', 'PagesController@search')->name('product.search');

//dashbord Controller
Route::get('/user/dashboard', 'UsersController@dashboard')->name('user.dashboard');
Route::get('/user/profile/show', 'UsersController@show')->name('user.profile.show');
Route::post('/user/profile/update', 'UsersController@update')->name('user.profile.update');

//Frontend product Controiller
Route::get('/products', 'ProductController@product')->name('product');
Route::get('/products/{slug}', 'ProductController@show')->name('product.show');
Route::get('/products/category', 'ProductController@index')->name('product.index');
Route::get('/products/category/{id}', 'ProductController@category')->name('product.category.show');

//Admin Pages Controller
Route::get('/admin/dashboard', 'AdminPagesController@index')->name('admin.index');

//Admin login
Route::get('/admin','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
Route::post('/admin/logout/submit','Auth\Admin\LoginController@logout')->name('admin.logout');

//Forgot Password Controller
Route::get('/admin/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

//Reset Password Controller
Route::get('/admin/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/admin/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

//product Controller
Route::get('/admin/products', 'AdminProductController@show')->name('admin.product.show');
Route::get('/admin/product/create', 'AdminProductController@create')->name('admin.product.create');
Route::post('/admin/product/store', 'AdminProductController@store')->name('admin.product.store');
Route::get('/admin/products/edit/{id}', 'AdminProductController@edit')->name('admin.products.edit');
Route::post('/admin/products/update/{id}', 'AdminProductController@update')->name('admin.products.update');
Route::post('/admin/products/delete/{id}', 'AdminProductController@delete')->name('admin.products.delete');

//Category Controller
Route::get('/admin/categorys', 'CategoryController@show')->name('admin.category.show');
Route::get('/admin/categorys/create', 'CategoryController@create')->name('admin.category.create');
Route::post('/admin/categorys/store', 'CategoryController@store')->name('admin.category.store');
Route::get('/admin/categorys/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
Route::post('/admin/categorys/update/{id}', 'CategoryController@update')->name('admin.category.update');
Route::post('/admin/categorys/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');

//Brand Controller
Route::get('/admin/brands', 'BrandController@show')->name('admin.brand.show');
Route::get('/admin/brands/create', 'BrandController@create')->name('admin.brand.create');
Route::post('/admin/brands/store', 'BrandController@store')->name('admin.brand.store');
Route::get('/admin/brands/edit/{id}', 'BrandController@edit')->name('admin.brand.edit');
Route::post('/admin/brands/update/{id}', 'BrandController@update')->name('admin.brand.update');
Route::post('/admin/brands/delete/{id}', 'BrandController@delete')->name('admin.brand.delete');

//Division Controller
Route::get('/admin/divisions', 'DivisionController@show')->name('admin.division.show');
Route::get('/admin/divisions/create', 'DivisionController@create')->name('admin.division.create');
Route::post('/admin/divisions/store', 'DivisionController@store')->name('admin.division.store');
Route::get('/admin/divisions/edit/{id}', 'DivisionController@edit')->name('admin.division.edit');
Route::post('/admin/divisions/update/{id}', 'DivisionController@update')->name('admin.division.update');
Route::post('/admin/divisions/delete/{id}', 'DivisionController@delete')->name('admin.division.delete');

//districts Controller
Route::get('/admin/districts', 'DistrictController@show')->name('admin.district.show');
Route::get('/admin/districts/create','DistrictController@create')->name('admin.district.create');
Route::post('/admin/districts/store','DistrictController@store')->name('admin.district.store');
Route::get('/admin/districts/edit/{id}','DistrictController@edit')->name('admin.district.edit');
Route::post('/admin/districts/update/{id}','DistrictController@update')->name('admin.district.update');
Route::post('/admin/districts/delete/{id}','DistrictController@delete')->name('admin.district.delete');

//Orders Controller
Route::get('/admin/orders','OrderController@index')->name('admin.order.index');
Route::get('/admin/orders/show/{id}','OrderController@show')->name('admin.order.show');
Route::post('/admin/orders/delete/{id}','OrderController@delete')->name('admin.order.delete');

Route::post('/admin/orders/completed/{id}','OrderController@completed')->name('admin.order.completed');
Route::post('/admin/orders/paid/{id}','OrderController@paid')->name('admin.order.paid');
Route::post('/admin/orders/charge-update/{id}','OrderController@chargeUpdate')->name('admin.order.charge');
Route::get('/admin/orders/invoice/{id}','OrderController@generateInvoice')->name('admin.order.invoice');

//Cart Controller
Route::get('/user/carts', 'CartController@index')->name('user.carts');
Route::post('/user/carts/store', 'CartController@store')->name('user.carts.store');
Route::post('/user/carts/update/{id}', 'CartController@update')->name('user.carts.update');
Route::post('/user/carts/delete/{id}', 'CartController@delete')->name('user.carts.delete');

//Checkout Controller checkout
Route::get('/user/checkouts', 'CheckoutController@index')->name('user.checkouts');
Route::post('/user/checkouts/store', 'CheckoutController@store')->name('user.checkouts.store');

//Slider Controller
Route::get('/admin/sliders', 'SliderController@show')->name('admin.slider.show');
Route::post('/admin/sliders/store','SliderController@store')->name('admin.slider.store');
Route::post('/admin/sliders/update/{id}','SliderController@update')->name('admin.slider.update');
Route::post('/admin/sliders/delete/{id}','SliderController@delete')->name('admin.slider.delete');





//

Route::get('/user/token/{token}','VerificationController@verify')->name('user.verification');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//API Route

Route::get('get-districts/{id}',function($id){
	return json_encode(App\District::where('division_id', $id)->get());
});