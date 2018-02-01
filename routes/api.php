<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->group(function () {
    #####UserController
    Route::post('login', 'Usercontroller@login');

    #####NewsController
    Route::get('all/news','NewsController@all_news');
    Route::get('news/{id}/show','NewsController@show');
    Route::get('news/{id}/edit','NewsController@edit');
    Route::get('news/{id}/update','NewsController@update');
    Route::get('news/{id}/delete','NewsController@destroy');

});

/*Route::middleware('auth:api')->get('/users', function () {
    return \App\User::all();
});

Route::group(['namespace'=>'Api'],function (){
    Route::prefix('api/v1')->group(function (){
        Route::get('login','UserController@login');
    });
});



/*
 * Route::namespace('Api')->group(function (){
    Route::prefix('api/v1')->group(function (){
        Route::get('login','UserController@login');
    });
});
 *
 */


/*
 * Route::middleware('admin')->group(function(){
    Route::namespace('Api')->group(function (){
        Route::prefix('api/v1')->group(function (){
            require_once __DIR__ . '/admin.php';
        });
    });
});
 */
