<?php

namespace CeytekLabs\OpenAI\Endpoints\Chat;

use CeytekLabs\OpenAI\Enums\Model;

class CreateImageCompletion
{
    private string $api;

    private string $key;

    private Model $model;

    private string $prompt;

    private int $maxTokens = 300;

    private \stdClass $response;

    public static function make(string $api, string $key)
    {
        $instance = new self;

        $instance->api = $api;
        $instance->key = $key;

        return $instance;
    }

    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function setPrompt(string $prompt): self
    {
        $this->prompt = $prompt;

        return $this;
    }

    public function setMaxTokens(int $maxTokens): self
    {
        $this->maxTokens = $maxTokens;

        return $this;
    }

    public function ask(string $text = null, string $imageUrl = null): self
    {
        $fields = [
            'max_tokens' => $this->maxTokens,
        ];

        if (! isset($this->model)) {
            throw new \Exception('Please set your model');
        }

        $fields['model'] = $this->model->value;

        if (! isset($this->prompt)) {
            throw new \Exception('Please set your prompt');
        }

        $fields['messages'][] = [
            'role' => 'system',
            'content' => $this->prompt,
        ];

        if (is_null($text)) {
            throw new \Exception('Please insert your text');
        }

        if (is_null($imageUrl)) {
            throw new \Exception('Please insert your image url');
        }

        $fields['messages'][] = [
            'role' => 'user',
            'content' => [
                [
                    'type' => 'text',
                    'text' => $text,
                ],
                [
                    'type' => 'image_url',
                    'image_url' => [
                        'url' => $imageUrl,
                    ],
                ],
            ],
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api.'/chat/completions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->key,
            ],
            CURLOPT_POSTFIELDS => json_encode($fields),
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: '.curl_error($curl));
        }

        curl_close($curl);

        $this->response = json_decode($response);

        return $this;
    }

    public function getResponse(): \stdClass
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response;
    }
}