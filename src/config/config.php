<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Routes
	|--------------------------------------------------------------------------
	|
	| Sentinel provides default routes for each of its components, but you can
	| alter those route paths here.  Note that this only changes the URL path,
	| not the names of the routes. 
	|
	*/

	'routes' => array(

		'users' 	=> 'users',
		
		'groups'	=> 'groups',
		
		'sessions'	=> 'sessions',

		'login'		=> 'login',

		'logout'	=> 'logout',

		'register'	=> 'register',

		'resend'	=> 'resend',

		'forgot'	=> 'forgot',

		),

	/*
	|--------------------------------------------------------------------------
	| Default Event Routes 
	|--------------------------------------------------------------------------
	|
	| At certain points in the login and registration process Sentinel will 
	| redirect the browser upon the completion of an event.  To change those 
	| redirect locations, provide the name of a different route.
	| 
	*/

	'post_login' 	=> 'home',

	'post_logout' 	=> 'home',

    'post_register' => 'home',

	/*
	|--------------------------------------------------------------------------
	| E-Mail Subject Lines
	|--------------------------------------------------------------------------
	|
	| When using the "Eloquent" authentication driver, we need to know which
	| Eloquent model should be used to retrieve your users. Of course, it
	| is often just the "User" model but you may use whatever you like.
	|
	*/

	'welcome' 			=> 'Account Registration Confirmation',

	'reset_password' 	=> 'Password Reset Confirmation',

	'new_password'		=> 'New Password Information',


	/*
	|--------------------------------------------------------------------------
	| Layout
	|--------------------------------------------------------------------------
	|
	| By default, the views provided by the package will extend their own 
	| default view (views/layouts/default.blade.php), even after they have been
	| published.  This option allows you to extend a custom view instead. 
	| 
	*/

	'layout' => 'Sentinel::layouts.default',


	/*
	|--------------------------------------------------------------------------
	| Registration
	|--------------------------------------------------------------------------
	|
	| By default, registration is enabled.  To turn off registration, change this 
	| value to false. 
	| 
	*/

	'registration' => true,

	/*
	|--------------------------------------------------------------------------
	| Default User Groups
	|--------------------------------------------------------------------------
	|
	| When a new user is created, they will automatically be added to the 
	| groups in this array.
	| 
	*/

	'default_user_groups' => array('Users'),
    
    /*
    |--------------------------------------------------------------------------
    | Attempts Limit
    |--------------------------------------------------------------------------
    |
    | When using the "eloquent" driver and extending the base Eloquent model,
    | you have the option to globally set the login attempts.
    |
    | Supported: int
    |
    */

    'reset_attempt_limit' => 3,

    /*
    |--------------------------------------------------------------------------
    | Suspension Time
    |--------------------------------------------------------------------------
    |
    | When using the "eloquent" driver and extending the base Eloquent model,
    | you have the option to globally set the suspension time, in minutes.
    |
    | Supported: int
    |
    */

    'reset_suspension_time' => 15,

    'resend_activation_code_limit' => 5, #Times

    'resend_activation_code_suspension_time' => 15, #Minutes
	
);
