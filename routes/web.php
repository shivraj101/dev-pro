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

//



//Application routes

//The WEB middleware group has session states, CSRF protection and more
Route::group(['middleware'=>['web']],function(){
	
	//Authentication Routes
	Route::get('login','Auth\LoginController@showLoginForm')
	->name('auth.showLoginForm');

	Route::post('login','Auth\LoginController@login')
	->name('auth.login');
	
	Route::get('logout','Auth\LoginController@logout');

	//Registration Routes
	Route::get('register','Auth\RegisterController@showRegistrationForm');
	Route::post('register','Auth\RegisterController@register');

	//password reset Routes
	Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/reset','Auth\ResetPasswordController@reset');
	Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
	
	//for the viewer (slugs Routes)
	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');//for a single post shown to the user through slug //words,numbers,-,_ can be used for slugs 
	Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex']);//for paginating the posts through slugs

	//building a blog with laravel
	Route::get('/','PagesController@getIndex');
	Route::get('about','PagesController@getAbout');
	Route::get('contact','PagesController@getContact');
	//Route::get('/single','PagesController@getSingle')->name('pages.single');//for single post in a single page for the viewer//not needed due to slug
	
	//CRUD opertations using resource method
	Route::resource('/posts','PostController');
});

Route::get('/show',function(){
	$value=App\Sample::first();
	echo $value->name;
});

Route::get('/name',function(){
	$get=App\Laptop::find(2);
	echo "Welcome ".$get->name."<br>"."Your current address is: ".$get->address;
});