<?php

namespace CeytekLabs\OpenAI\Endpoints;

use CeytekLabs\OpenAI\Endpoints\Chat\CreateCompletion;
use CeytekLabs\OpenAI\Endpoints\Chat\CreateImageCompletion;

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

    public function createImageCompletion(): CreateImageCompletion
    {
        return CreateImageCompletion::make($this->api, $this->key);
    }
}