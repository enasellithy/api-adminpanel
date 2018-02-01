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
/*Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {

    });




/*Route::group('middleware'=>['admin'],function (){
    Route::namespace('Admin')->group(function (){
    Route::prefix('admin')->group(function (){
        require_once __DIR__ . '/admin.php';
    });
});
});
*/

Auth::routes();

Route::get('chat','ChatController@getChat');
Route::post('chat/add','ChatController@storeChat');

Route::get('/', 'CommentController@welcome');
Route::get('{id}/news', 'CommentController@showNews');
Route::post('add/comment', 'CommentController@addComment');

Route::post('upload/image','ImageController@store');

Route::get('/{id}', 'CommentController@addComment');

#####PdfController
Route::get('pdf/pdf','PdfController@index');


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::prefix('admin')->group(function () {
            require_once __DIR__ . '/admin.php';
        });
    });
});


