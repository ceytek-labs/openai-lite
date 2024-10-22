<?php

namespace CeytekLabs\OpenAI\Endpoints\Model;

use CeytekLabs\OpenAI\Enums\Model;

class ModelRetrieve
{
    private string $api;

    private string $key;

    private \stdClass $response;

    public static function make(string $api, string $key)
    {
        $instance = new self;

        $instance->api = $api;
        $instance->key = $key;

        return $instance;
    }

    public function ask(Model $model): self
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api.'/models/'.$model->value,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->key,
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: '.curl_error($curl));
        }

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

    public function getId(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response->id;
    }

    public function getObject(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response->object;
    }

    public function getCreated(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response->created;
    }

    public function getOwnedBy(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response->owned_by;
    }
}