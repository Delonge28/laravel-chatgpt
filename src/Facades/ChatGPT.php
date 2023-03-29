<?php

namespace Delonge\LaravelChatGPT\Facades;

use Illuminate\Support\Facades\Facade;

class ChatGPT extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Delonge\LaravelChatGPT\ChatGPTClient::class;
    }
}