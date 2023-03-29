<?php

namespace Delonge28\LaravelChatGPT\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array listEngines()
 * @method static array getEngine(string $engine_id)
 *
 * @see \Delonge28\LaravelChatGPT\ChatGPTClient
 */
class ChatGPT extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Delonge28\LaravelChatGPT\ChatGPTClient::class;
    }
}