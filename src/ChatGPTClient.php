<?php

namespace Delonge28\LaravelChatGPT;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
class ChatGPTClient
{
    protected $apiKey;
    protected $client;
    protected $baseURL = 'https://api.openai.com/v1/engines/davinci-codex/completions';

    public function __construct(string $apiKey, string $baseURL = null)
    {
        $this->apiKey = $apiKey;
        $this->baseURL = $baseURL ?? $this->baseURL;
        $this->client = new Client([
            'base_uri' => $this->baseURL,
            'headers' => [
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function sendMessage(string $message, array $options = []): array
    {
        $payload = array_merge([
            'prompt' => $message,
            'max_tokens' => 100,
            'n' => 1,
            'stop' => null,
            'temperature' => 1,
        ], $options);

        try {
            $response = $this->client->post('', [
                'json' => $payload,
            ]);

            $responseData = json_decode((string)$response->getBody(), true);

            return $responseData['choices'][0]['text'] ?? '';
        } catch (GuzzleException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }
}