<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenAI ChatGPT API Key
    |--------------------------------------------------------------------------
    |
    | This value is the API key required to access OpenAI's ChatGPT API.
    | You can obtain an API key by signing up for an account at:
    | https://beta.openai.com/signup/
    |
    */

    'api_key' => env('CHATGPT_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | OpenAI ChatGPT API Base URL
    |--------------------------------------------------------------------------
    |
    | This value is the base URL for the ChatGPT API. You can set a custom
    | base URL here, or leave it as the default OpenAI API URL.
    |
    */

    'base_url' => env('CHATGPT_BASE_URL', 'https://api.openai.com/v1'),

    /*
    |--------------------------------------------------------------------------
    | Default API Options
    |--------------------------------------------------------------------------
    |
    | These are the default options that will be sent with every API request.
    | You can customize these options according to your application needs.
    | For more information, visit https://beta.openai.com/docs/api-reference/completions
    |
    */

    'default_options' => [
        'max_tokens' => 100,
        'n' => 1,
        'stop' => null,
        'temperature' => 1,
    ],

    'rate_limiting' => [
        'enabled' => env('CHATGPT_RATE_LIMITING_ENABLED', false),
        'requests' => env('CHATGPT_RATE_LIMIT_REQUESTS', 60),
        'duration' => env('CHATGPT_RATE_LIMIT_DURATION', 60),
    ],
];
