<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

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

//Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

//Visitor
Route::get('/', function () {
    return view('welcome');
});

//Stripe
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
//Stripe 2
//4242424242424242
Route::get('str', [StripeController::class, 'index']);
Route::post('str', [StripeController::class, 'makePayment'])->name('make-payment');


//Visitor
Route::get('/dash/{chap}', 'App\Http\Controllers\TestController@show')->name('dash.show');
Route::get('/test/{chap}{dif}', 'App\Http\Controllers\TestController@shows')->name('test.shows');
Route::post('/dash', 'App\Http\Controllers\TestController@testResult')->name('dash.store');
//Route::get('/results/{result_id}', 'App\Http\Controllers\TestController@result')->name('results.show');


//User
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tt', [App\Http\Controllers\TestController::class, 'index']);

Route::get('/table', [App\Http\Controllers\JoinTableController::class, 'index']);

Route::get('/app', [App\Http\Controllers\JoinTableController::class, 'getQuestions']);

