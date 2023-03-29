<?php

namespace Delonge28\LaravelChatGPT;

use Illuminate\Support\ServiceProvider;

class ChatGPTServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/chatgpt.php' => config_path('chatgpt.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chatgpt.php', 'chatgpt');

        $this->app->singleton(ChatGPTClient::class, function ($app) {
            $config = $app['config']['chatgpt'];
            return new ChatGPTClient($config['api_key'], $config['base_url'] ?? null);
        });
    }
}