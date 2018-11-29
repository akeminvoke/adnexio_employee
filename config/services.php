<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
	
    'facebook' => [
        'client_id' => '295496244376169',
        'client_secret' => 'bcdc74969f0d92a73fb7f853aef7732f',
        'redirect' => 'https://employee.adnexio.my/callback',
    ],
	
	/*
	'facebook' => [
        'client_id' => '295496244376169',
        'client_secret' => 'bcdc74969f0d92a73fb7f853aef7732f',
        'redirect' => 'https://localhost:8000/callback',
    ],
	*/

    'google' => [
        'client_id' => '168357464964-ahqgllohfl1q15cqucjt6vguon1i73q9.apps.googleusercontent.com',
        'client_secret' => 'VGrJdLa6dXUsS3sRTcudOEKP',
        'redirect' => 'https://employee.adnexio.my/gcallback',
	],
		
	/*	
	'google' => [
        'client_id' => '168357464964-sajj7diln0spa7tivqsh1jumn4apb8ag.apps.googleusercontent.com',
        'client_secret' => 'N8rehlbpswwjl_DYAsiwDmAZ',
        'redirect' => 'http://localhost:8000/gcallback',
	],	
    */
];
