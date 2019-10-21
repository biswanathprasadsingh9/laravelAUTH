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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', function () {
    return view('contact');
})->middleware('auth');

Route::get('/testmail', function()
{
	   $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.welcome', [], function($message)
    {
        $message
			->from('pcgameshopbbsr@gmail.com')
			->to('b21341995returns@gmail.com', 'John Smith')
			->subject('Welcome!');

    });

});
