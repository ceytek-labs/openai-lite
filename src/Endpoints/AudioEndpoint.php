<?php

namespace CeytekLabs\OpenAI\Endpoints;

use CeytekLabs\OpenAI\Endpoints\Audio\CreateSpeech;
use CeytekLabs\OpenAI\Endpoints\Audio\CreateTranscription;

class AudioEndpoint
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

    public function createSpeech(): CreateSpeech
    {
        return CreateSpeech::make($this->api, $this->key);
    }

    public function createTranscription(): CreateTranscription
    {
        return CreateTranscription::make($this->api, $this->key);
    }
}