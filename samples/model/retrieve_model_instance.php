<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)->modelRetrieve()
        ->ask(Model::GPT_4O_MINI);

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}