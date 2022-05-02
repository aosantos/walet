<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::prefix('api/')
 //  ->name('transaction.')
   // ->group(static function (): void {
       // Route::get('index', 'UserController@index')->name('index');
       // Route::post('import', 'LeadController@import')->name('import');
       // Route::get('import_example', 'LeadController@importExample')->name('importExample');
       // Route::get('create-many', [Controllers\LeadController::class, 'createMany'])->name('create_many');
       // Route::post('store-many', [Controllers\LeadController::class, 'storeMany'])->name('store_many');
  //  });

//Route::resource('users', '\App\Http\Controllers\UserController');
Route::get('index', '\App\Http\Controllers\UserController@index')->name('index');
Route::get('show/{id}', '\App\Http\Controllers\UserController@show')->name('show');
Route::post('store', '\App\Http\Controllers\UserController@store')->name('store');
Route::put('update/{id}', '\App\Http\Controllers\UserController@update')->name('update');
Route::delete('delete/{id}', '\App\Http\Controllers\UserController@delete')->name('delete');

Route::post('transaction', '\App\Http\Controllers\TransactionController@transaction')->name('transaction');
