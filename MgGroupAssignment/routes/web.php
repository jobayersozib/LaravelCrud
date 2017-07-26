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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Middleware;

Route::get('/', function (Request $request) {
	if($request->session()->has('user')){
    	return redirect('/products');
	}else{
		//session(['users' => 'jobayer']);
		return view('welcome');
	}
});

/*
 Resource controller for products start
*/
Route::resource('products','ProductController');
Route::post('/products/add','ProductController@store');
/*
 Resource controller for products end

*/


Route::resource('users','UserController');
Route::get('/login','UserController@login');
Route::post('/auth','UserController@auth');
Route::post('/products','UserController@store');
Route::get('/logout','UserController@logout');