<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make('<your-key-here>')
        ->model()
        ->retrieve()
        ->ask(Model::GPT_4O_MINI);

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}