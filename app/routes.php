<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as'    =>  'home',
    'uses'  =>  'HomeController@home'
]);


Route::get('/user/{username}', [
    'as'    =>  'profile-user',
    'uses'  =>  'ProfileController@user'
]);

/*
*  Authenticated group
*/
Route::group(['before'=>'auth'], function() {


    /*
    *  CSRF protection group
    */

    Route::group(['before'=>'csrf'], function() {
        /*
        *  Change Password (POST)
        */
        Route::post('/account/change-password',[
            'as'    => 'account-change-password-post',
            'uses'  => 'AccountController@postChangePassword'
        ]);

    });

    /*
    *  Change Password (GET)
    */
    Route::get('/account/change-password',[
        'as'    => 'account-change-password',
        'uses'  => 'AccountController@getChangePassword'
    ]);

    /*
    *  Sign Out (GET)
    */
    Route::get('/account/sign-out', [
        'as'    => 'account-sign-out',
        'uses'  =>  'AccountController@getSignOut'
    ]);

});

/*
*  Unauthenticated group
*/

Route::group(['before'=>'guest'], function() {

/*
*  CSRF protection group
*/

    Route::group(['before'=>'csrf'], function() {
/*
*  Sign in (Post)
*/
        Route::post('/account/sign-in', [
            'as'    =>  'account-sign-in-post',
            'uses'  =>  'AccountController@postSignIn'
        ]);

/*
*  forgot password (POST)
*/
        Route::post('/account/forgot-password', [
            'as'    => 'account-forgot-password-post',
            'uses'  => 'AccountController@postForgotPassword'
        ]);

/*
*  Create account (POST)
*/
        Route::post('/account/create', [
            'as'    =>  'account-create-post',
            'uses'  =>  'AccountController@postCreate'
        ]);

    });


/*
*  forgot password (GET)
*/
    Route::get('/account/forgot-password', [
        'as'    => 'account-forgot-password',
        'uses'  => 'AccountController@getForgotPassword'
    ]);

/*
*  recover email route (GET)
*/
    Route::get('/account/recover/{code}', [
       'as'     => 'account-recover',
        'uses'  => 'AccountController@getRecover'
    ]);

/*
*  Sign in (GET)
*/
    Route::get('/account/sign-in', [
        'as'    =>  'account-sign-in',
        'uses'  =>  'AccountController@getSignIn'
    ]);

/*
*  Create account (GET)
*/
    Route::get('/account/create', [
        'as'    =>  'account-create',
        'uses'  =>  'AccountController@getCreate'
    ]);

    Route::get('/account/activate/{code}',[
        'as'    =>  'account-activate',
        'uses'  =>  'AccountController@getActivate'
    ]);
});