<?php

namespace Delonge\LaravelChatGPT\Tests;

use Delonge\LaravelChatGPT\ChatGPTClient;
use Orchestra\Testbench\TestCase;

class LaravelChatGPTTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [\Delonge\LaravelChatGPT\ChatGPTServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('chatgpt.api_key', 'your_test_api_key_here');
    }

    /** @test */
    public function it_can_send_message()
    {
        $client = $this->app->make(ChatGPTClient::class);
        $message = 'Once upon a time...';
        $response = $client->sendMessage($message);

        if (isset($response['error'])) {
            $this->markTestSkipped('API request failed with error: ' . $response['error']);
        } else {
            $responseData = json_decode($response->getBody(), true);
            $choice = $responseData['choices'][0];

            $this->assertIsArray($responseData);
            $this->assertArrayHasKey('text', $choice);
            $this->assertNotEmpty($choice['text']);
        }
    }
}