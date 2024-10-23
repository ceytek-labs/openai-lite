<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)
        ->model()
        ->retrieve()
        ->ask(Model::GPT_4O_MINI);

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}