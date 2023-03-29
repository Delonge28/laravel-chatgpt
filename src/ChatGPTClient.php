<?php

namespace Delonge28\LaravelChatGPT;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ChatGPTClient
{
    protected $apiKey;
    protected $client;
    protected $baseURL = 'https://api.openai.com/v1/';

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

    public function sendMessage(string $prompt, array $options = []): array
    {
        $payload = array_merge([
            'prompt' => $prompt,
            'max_tokens' => 100,
            'n' => 1,
            'stop' => null,
            'temperature' => 1,
        ], $options);

        try {
            $response = $this->client->post('/chat/completions/', [
                'json' => $payload,
            ]);

            $responseData = json_decode((string)$response->getBody(), true);


            return $responseData ?? '';
        } catch (GuzzleException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    public function listEngines(): array
    {
        try {
            $response = $this->client->get('models');

            $responseData = json_decode((string)$response->getBody(), true);

            return $responseData['data'];
        } catch (GuzzleException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

    public function getEngine(string $engine_id)
    {
        try {
            $response = $this->client->get("models/{$engine_id}");
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }

}