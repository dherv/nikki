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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', 'RegisterController@store');
Route::post('/login', 'SessionController@store');

// Route::group(['middleware' => ['authCheck']], function () {
Route::get('/dailies', 'DailyController@index');

Route::post('/daily/create', 'DailyController@store');
Route::put('/daily/update/{daily}', 'DailyController@update');
Route::delete('/daily/{daily}', 'DailyController@destroy');
Route::get('/daily/{daily}', 'DailyController@show');

Route::post('/word/{daily}', 'WordController@store');
Route::get('/words', 'WordController@index');

Route::post('/grammar/{daily}', 'GrammarController@store');
Route::get('/grammars', 'GrammarController@index');

Route::post('/language/create', 'LanguageController@store');
Route::get('/languages', 'LanguageController@index');

Route::put('/language/{language}', 'LanguageController@update');

Route::get('/logout', 'SessionController@destroy');
// });

