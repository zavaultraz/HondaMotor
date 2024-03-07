<?php

use App\Http\Controllers\HondaController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//handle redirect reegister to login
Route::match(['GET','POST'], '/register',
function(){
    return  redirect('login');
}
);


//route for news using resource


//middleware for admin panel
Route::resource('honda', HondaController::class)->middleware('auth');
//route midleware
Route::middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route admin
Route::middleware(['auth','admin'])
->group(function() {
    // route for news usinng rsc
    Route::resource('product', ProductController::class);
    //route for category using rsc
Route::resource('category', HondaController::class);});
});