<?php

namespace CeytekLabs\OpenAI\Injections;

use CeytekLabs\OpenAI\Enums\Endpoints\ChatMethod;
use CeytekLabs\OpenAI\Injections\Chat\ChatCreate;

class ChatInjection
{
    public static function make(string $key, ChatMethod $method)
    {
        $api = 'https://api.openai.com/v1';

        if ($method === ChatMethod::Create) {
            return ChatCreate::make($api, $key);
        }

        throw new \Exception('This method does not available');
    }
}