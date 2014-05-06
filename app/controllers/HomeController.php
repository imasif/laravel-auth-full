<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function home() {

//        Mail::send('emails.auth.test',
//            [
//                'name'=>'Asif'
//            ],
//            function($message)
//            {
//                $message->to('asif@gdastudio.org', 'Asif Khan')->subject('Test email');
//            }
//        );

        return View::make('home');
    }

}
