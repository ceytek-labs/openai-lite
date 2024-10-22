<?php

namespace CeytekLabs\OpenAI\Injections;

use CeytekLabs\OpenAI\Enums\Endpoints\ModelsMethod;
use CeytekLabs\OpenAI\Injections\Models\ModelsList;

class ModelsInjection
{
    public static function make(string $key, ModelsMethod $method): ModelsList
    {
        $api = 'https://api.openai.com/v1';

        if ($method === ModelsMethod::List) {
            return ModelsList::make($api, $key, $method->value);
        }

        throw new \Exception('This method does not available');
    }
}
