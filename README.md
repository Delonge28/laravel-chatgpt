# Laravel ChatGPT

Laravel ChatGPT is a Laravel package that simplifies the integration with OpenAI's ChatGPT API. It provides an easy-to-use API client and follows Laravel's best practices, allowing you to generate human-like text completions in your Laravel application.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Rate Limiting](#rate-limiting)
- [Additional ChatGPT API Features](#additional-chatgpt-api-features)
  - [List Engines](#list-engines)
- [Testing](#testing)
- [License](#license)

## Installation

1. Require the package using Composer:

```bash
composer require delonge/laravel-chatgpt
```

2. Publish the configuration file:

```bash
php artisan vendor:publish --tag=config --provider="Delonge\LaravelChatGPT\ChatGPTServiceProvider"
```
This command will publish the chatgpt.php configuration file to your config directory.

## Configuration

1. Set the CHATGPT_API_KEY environment variable in your .env file:

```bash
CHATGPT_API_KEY=your_openai_api_key
```
Replace your_openai_api_key with your actual ChatGPT API key.

Optionally, you can set a custom CHATGPT_BASE_URL in your .env file if you want to use a different API endpoint:

```bash
CHATGPT_BASE_URL=https://api.example.com/v1/engines/davinci-codex/completions
```
3. You can customize the default options for API requests in the config/chatgpt.php file. For more information about these options, refer to the OpenAI API documentation.

## Usage
To interact with the ChatGPT API, you can use the ChatGPT facade or resolve the ChatGPTClient class from the Laravel container:

```php
use Delonge\LaravelChatGPT\Facades\ChatGPT;

$response = ChatGPT::sendMessage('Your message here');
```
You can also pass an array of custom options to the sendMessage method:

```php
$options = [
    'max_tokens' => 50,
    'temperature' => 0.8,
];

$response = ChatGPT::sendMessage('Your message here', $options);
```
## Rate Limiting
Laravel ChatGPT package supports rate limiting to help you stay within the ChatGPT API's rate limits. To enable and configure rate limiting, update the following values in your `.env` file:

```env
CHATGPT_RATE_LIMITING_ENABLED=true
CHATGPT_RATE_LIMIT_REQUESTS=60
CHATGPT_RATE_LIMIT_DURATION=60
```

## Additional ChatGPT API Features

The Laravel ChatGPT package also provides methods to interact with other ChatGPT API endpoints:

### List Engines

To fetch the list of available engines, use the `listEngines` method:

```php
use Delonge\LaravelChatGPT\Facades\ChatGPT;

// List engines
$engines = ChatGPT::listEngines();

// Get engine details
$engine = ChatGPT::getEngine('davinci-codex');
```




## Testing
To run the package's tests, execute the following command in your terminal:
``` bash
vendor/bin/phpunit
```

## License
This package is open-source software licensed under the [MIT license](https://opensource.org/license/mit/).


