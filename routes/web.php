<?php

use App\Http\Controllers\AdminController;
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
Route::get('/home', function(){
    return redirect(route('home'));
});

Route::get('/logout', function(){
    auth()->logout();
    return redirect(route('home'));
});





Route::group(['middleware' => 'webInit'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    //cart
    Route::resource('/cart', 'CartController',['except' => [ 'destroy']]);
    Route::get('/cart/remove/{id}', 'CartController@destroy')->name('cart.destroy');

    //product
    Route::get('/product/{name}/{id}', 'HomeController@product')->name('product');

    //checkout
    Route::resource('/checkout', 'CheckoutController');

    //user:web
    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/account', 'AccountController@index')->name('account');
        Route::get('/profile', 'AccountController@profile')->name('profile');
        Route::post('/profile', 'AccountController@profile_update')->name('profile');
        Route::get('/orders', 'AccountController@order')->name('order');
    });



    // Route::get('/category', 'HomeController@catalog_By_Category')->name('category');
    // Route::get('/privacy-policy', function(){return view('privacy-policy');})->name('privacy-policy');
    // Route::get('/about', function(){return view('about');})->name('about');
    // Route::get('/catalogs', 'HomeController@catalogs')->name('catalog');
    // Route::get('/retailer', 'HomeController@retailer')->name('retailer');
    // Route::get('/contact', 'HomeController@contact')->name('contact');
    // Route::get('/search', 'HomeController@search')->name('search');
    // Route::resource('/retailer', 'RetailerController',['only' => [ 'store']]);
    // Route::get('/brand', 'HomeController@catalog_By_Brand')->name('brand');

});


Auth::routes();




Route::group(['prefix' => 'admin','as' => 'admin.'], function () {

    Route::get('login','AdminController@loginForm')->name('login');
    Route::post('login','AdminController@login')->name('login');

    Route::get('forgot','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('forgot');
    Route::post('forgot','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('forgot');

    Route::get('reset','Auth\AdminResetPasswordController@showResetForm')->name('reset');
    Route::post('reset','Auth\AdminResetPasswordController@reset')->name('reset');



    // secured
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('logout','AdminController@logout')->name('logout');
        Route::get('/','AdminController@index')->name('index');
        Route::resource('category', 'CategoryController');
        Route::resource('catalog', 'CatalogController');
        Route::resource('product', 'ProductController');
        Route::resource('brand', 'BrandController');
        Route::resource('contact', 'ContactController');
        Route::resource('retailer', 'RetailerController',['only' => [ 'index']]);
        Route::resource('profile', 'ProfileController',['only' => [ 'create', 'store']]);
        Route::resource('setting', 'SettingController',['only' => [ 'create', 'store']]);
        Route::resource('home-page', 'HomePageController',['only' => [ 'create', 'store']]);

        Route::resource('gallery', 'GalleryController');

        Route::get('orders', 'SettingController@order_admin')->name('order');
    });

});
