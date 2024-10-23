<?php

namespace CeytekLabs\OpenAI;

use CeytekLabs\OpenAI\Endpoints\AudioEndpoint;
use CeytekLabs\OpenAI\Endpoints\ChatEndpoint;
use CeytekLabs\OpenAI\Endpoints\ModelEndpoint;

class OpenAI
{
    private string $api = 'https://api.openai.com/v1';

    private string $key;

    public static function make(string $key = null): self
    {
        if (is_null($key)) {
            throw new \Exception('Key must be filled');
        }

        $instance = new self;

        $instance->key = $key;

        return $instance;
    }
    public function audio(): AudioEndpoint
    {
        return AudioEndpoint::make($this->api, $this->key);
    }

    public function chat(): ChatEndpoint
    {
        return ChatEndpoint::make($this->api, $this->key);
    }

    public function model(): ModelEndpoint
    {
        return ModelEndpoint::make($this->api, $this->key);
    }
}