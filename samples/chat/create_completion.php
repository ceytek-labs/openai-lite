<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)
        ->chat()
        ->createCompletion()
        ->setModel(Model::GPT_3_5_TURBO_0125)
        ->setBehave('give your answer as json and keep it simple')
        ->ask('What is your name');

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}