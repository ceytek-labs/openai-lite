<?php

namespace CeytekLabs\OpenAI\Endpoints\Chat;

use CeytekLabs\OpenAI\Enums\Model;

class CreateCompletion
{
    private string $api;

    private string $key;

    private Model $model;

    private string $behaveContent;

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

    public function setBehave(string $behaveContent): self
    {
        $this->behaveContent = $behaveContent;

        return $this;
    }

    public function ask(string $content = null): self
    {
        $fields = [];

        if (! isset($this->model)) {
            throw new \Exception('Please set your model');
        }

        $fields['model'] = $this->model->value;

        if (is_null($content)) {
            throw new \Exception('Please insert your content');
        }

        $fields['messages'][] = [
            'role' => 'user',
            'content' => $content,
        ];

        if (isset($this->behaveContent)) {
            $fields['messages'][] = [
                'role' => 'system',
                'content' => $this->behaveContent,
            ];
        }

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