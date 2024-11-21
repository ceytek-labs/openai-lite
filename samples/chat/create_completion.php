<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make('<your-key-here>')
        ->chat()
        ->createCompletion()
        ->setModel(Model::GPT_3_5_TURBO_0125)
        ->setPrompt('give your answer as json and keep it simple')
        ->ask('What is your name');

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}