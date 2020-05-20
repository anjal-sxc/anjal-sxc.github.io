<?php

use App\Inbox;
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

function isAuthenticated(): bool
{
    return session()->exists('user');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@validateUser')->name('login');

Route::get('/register', 'RegisterController@create')->name('register');
Route::post('/register', 'RegisterController@store')->name('register');

Route::get('/dashboard/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');



Route::get('/dashboard', function () {
    if(isAuthenticated()) {
        return view('dashboard.index');
    } else {
        return redirect('login');
    }
})->name('dashboard');

Route::get('/dashboard/compose', function () {
    if(isAuthenticated()) {
        $user = \App\User::where('email', session('email'))->get()->first();
        return view('dashboard.compose', ['user'=>$user]);
    } else {
        return redirect('login');
    }
})->name('compose');

Route::get('/dashboard/inbox', 'InboxController@index')->name('inbox');
Route::post('/dashboard/inbox', 'InboxController@destroy')->name('inbox');
Route::get('/dashboard/inbox/{id}', 'InboxController@show');

Route::get('/dashboard/sent', 'SentController@index')->name('sent');
Route::post('/dashboard/sent', 'SentController@destroy')->name('sent');
Route::get('/dashboard/sent/{id}', 'SentController@show');


Route::get('/dashboard/trash', 'TrashController@index')->name('trash');
Route::post('/dashboard/trash', 'TrashController@update')->name('trash');

Route::post('/dashboard/compose', 'SentController@store');

