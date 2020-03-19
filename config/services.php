<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => '109087283051-krn8a68ab0s83rkee88t1usoodfrpn8i.apps.googleusercontent.com',
        'client_secret' => 'ba7SE0QRBgxs4Gb26zmBlS2X',
        'redirect'      => 'https://royalforum.herokuapp.com/google/callback',
    ],

    'github' => [
        'client_id'     => '44aebcad6c09f6760119',
        'client_secret' => '20dc2f7a4701b359cc0156fee7d35789d739406c',
        'redirect'      => 'https://royalforum.herokuapp.com/github/callback',
    ],

];
