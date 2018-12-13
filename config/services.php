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
        'client_id' => '195198244755555',                           // Your Facebook Client ID
        'client_secret' => '7597cec33d67535b3db0f0782b9b38f9',      // Your Facebook Client Secret
        'redirect' => 'http://localhost/imdb/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '200202697623-hcrr5b7ftie3dl255b4dsd7jtrblrkci.apps.googleusercontent.com', //Your Google Client ID
        'client_secret' => 'Z8rPx5UmBeffHS4YRN-2Gccy',                                              // Your Google Client Secret
        'redirect' => 'http://localhost/imdb/login/google/callback',
    ],

];
