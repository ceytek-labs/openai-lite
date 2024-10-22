<?php

namespace CeytekLabs\OpenAI\Injections\Models;

class ModelsList
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

    public function ask(): self
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api.'/models',
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

    public function getObject(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response->object;
    }

    public function getData(): \stdClass
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return (object) $this->response->data;
    }
}