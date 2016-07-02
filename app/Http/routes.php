<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('index');
});
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','metadata']], function () {
    
    /* Generate language prefix */
    if(count(Config::get('languages')) > 1){
        if (array_key_exists(Request::segment(1), Config::get('languages'))) {
            App::setLocale(Request::segment(1));
            Config::set('locale', Request::segment(1));
        }else{
            Config::set('locale', Config::get('app.locale'));
        }
        $local = Config::get('locale');
    }else{
        $local = '';
    }
    
    Route::get('/', 'IndexController@lang',['as'=>'accueil']); //Index routes
    
    /* Front routes */
    Route::group(['prefix' => $local, 'middleware' => ['language.redirect']], function () {
        Route::auth(); //Auth routes
        Route::resource('/', 'IndexController',['as'=>'accueil']); //Index routes
        Route::get('page/{slug}/',['as'=>'page' , 'uses'=>'PageController@show'])->where('slug', '[a-z0-9\-]+');
    });
    
    
    /* Admin routes */
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin1452872135', 'middleware' => ['auth', 'admin', 'language']], function () {
        Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
        Route::resource('/','IndexController', ['as'=> 'accueil']);
        Route::resource('/pages','PageController', ['as'=> 'pages']);
    });
});
