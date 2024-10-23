<?php

namespace CeytekLabs\OpenAI\Endpoints;

use CeytekLabs\OpenAI\Endpoints\Chat\CreateCompletion;

class ChatEndpoint
{
    private string $api;

    private string $key;

    public static function make(string $api, string $key): self
    {
        $instance = new self;

        $instance->api = $api;
        $instance->key = $key;

        return $instance;
    }

    public function createCompletion(): CreateCompletion
    {
        return CreateCompletion::make($this->api, $this->key);
    }
}