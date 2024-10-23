<?php

namespace CeytekLabs\OpenAI\Endpoints;

use CeytekLabs\OpenAI\Endpoints\Model\AvailableList;
use CeytekLabs\OpenAI\Endpoints\Model\Retrieve;

class ModelEndpoint
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

    public function availableList(): AvailableList
    {
        return AvailableList::make($this->api, $this->key);
    }

    public function retrieve(): Retrieve
    {
        return Retrieve::make($this->api, $this->key);
    }
}