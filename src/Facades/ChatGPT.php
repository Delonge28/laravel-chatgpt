<?php

namespace Delonge28\LaravelChatGPT\Facades;

use Illuminate\Support\Facades\Facade;

class ChatGPT extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Delonge28\LaravelChatGPT\ChatGPTClient::class;
    }
}