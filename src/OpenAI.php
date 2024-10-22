<?php

namespace CeytekLabs\OpenAI;

use CeytekLabs\OpenAI\Enums\Endpoints\ChatMethod;
use CeytekLabs\OpenAI\Enums\Endpoints\ModelsMethod;
use CeytekLabs\OpenAI\Injections\ChatInjection;
use CeytekLabs\OpenAI\Injections\Models\ModelsList;
use CeytekLabs\OpenAI\Injections\ModelsInjection;

class OpenAI
{
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

    public function setMethod(ChatMethod|ModelsMethod $method)
    {
        if ($method instanceof ChatMethod) {
            return ChatInjection::make($this->key, $method);
        }

        if ($method instanceof ModelsMethod) {
            return ModelsInjection::make($this->key, $method);
        }
    }
}