<?php
use App\Http\Controllers\RestoController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/',[RestoController::class,'show'])->name('show');
Route::group(['middleware'=>'guest'],function(){
Route::get('login',[RestoController::class,'index'])->name('login');
Route::post('login',[RestoController::class,'login'])->name('login')->middleware('throttle:2,1');

Route::get('register',[RestoController::class,'register_view'])->name('register');
Route::post('register',[RestoController::class,'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[RestoController::class,'show'])->name('show');
    Route::get('logout',[RestoController::class,'logout'])->name('logout');
});

Route::get('add-to-cart/{id}',[RestoController::class,'addToCart']);
Route::get('add-to-fav/{id}',[RestoController::class,'addToFav']);
Route::get('cart',[RestoController::class,'cart']);
Route::get('fav',[RestoController::class,'fav']);
Route::patch('update-cart',[RestoController::class,'update']);
Route::get('remove-from-cart/{id}',[RestoController::class,'remove']);
Route::get('order',[RestoController::class,'order']);
Route::get('thanks', function () {
    return view('resto.thanks');
});

Route::get('order_confirmation',[RestoController::class,'sendemail']);
