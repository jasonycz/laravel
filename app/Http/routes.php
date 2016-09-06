<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
// 	return view('greeting',['name' => 'jason']);
//     // return view('welcome');
// });

Route::get('now', function () {
		// $class = new ReflectionClass('Page');
		// $properties = $class->getProperties();

		// dd($properties);
    return date("Y-m-d H:i:s");
});

// auth()其实是在Router.php当中定义的一个路由函数
Route::auth();

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/', 'HomeController@index');

Route::group([
			'prefix' => 'admin',
			'namespace' => 'Admin',
			'middleware' => 'auth',
		],function(){
			Route::get('/','AdminHomeController@index');
			Route::resource('pages','PagesController');
		}
);
Route::get('pages/{id}','Admin\PagesController@show');



// Route::get('article/{id}', 'ArticleController@show');
// Route::post('comment', 'CommentController@store');


// Route::get('user/{name?}', function($name = 'John')
// {
//     return $name;
// })->where('name', '^h+.*');;
