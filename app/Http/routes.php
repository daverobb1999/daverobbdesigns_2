<?php

use App\Projects;
use App\Http\ProjectController;


// Admin area
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::group(['middleware' => ['web']], function (){
    Route::auth();

    Route::get('/resume', function () {
        //return view('resume');
        $filename = 'DavidRobb%202016-public.pdf';
        $path = 'http://daverobbdesigns.com/public/pdf/'.$filename;

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$filename,
        ]);
    });

    Route::get('/', 'PortfolioController@index');

    Route::get('/home/', 'PortfolioController@index');

    Route::get('/project/{id}', 'PortfolioController@show');


    //Route::get('dashboard', 'ProjectController@index');
    Route::resource('dashboard', 'ProjectController');

    //$this->get('dashboard', 'ProjectController@index');
    Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'ProjectController@index']);
    Route::get('dashboard/create', ['middleware' => 'auth', 'uses' => 'ProjectController@create']);
    Route::get('dashboard/edit', ['middleware' => 'auth', 'uses' => 'ProjectController@delete']);

    // Logging in and out
// Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');


// Registration Routes...
    //$this->get('register', 'Auth\AuthController@showRegistrationForm');
    //$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');


});

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


    Route::group(['middleware' => ['web']], function () {
        Route::get('contact', 'ContactController@getContact');
        Route::post('contact_request', 'ContactController@getContactUsForm');
    });


