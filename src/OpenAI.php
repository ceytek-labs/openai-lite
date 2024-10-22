<?php

namespace CeytekLabs\OpenAI;

use CeytekLabs\OpenAI\Endpoints\Chat\ChatCreate;
use CeytekLabs\OpenAI\Endpoints\Model\ModelList;
use CeytekLabs\OpenAI\Endpoints\Model\ModelRetrieve;

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

    public function chatCreate(): ChatCreate
    {
        return ChatCreate::make($this->api, $this->key);
    }

    public function modelList(): ModelList
    {
        return ModelList::make($this->api, $this->key);
    }

    public function modelRetrieve(): ModelRetrieve
    {
        return ModelRetrieve::make($this->api, $this->key);
    }
}