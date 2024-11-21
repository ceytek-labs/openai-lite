<?php

use CeytekLabs\OpenAI\OpenAI;

try {
    $openai = OpenAI::make('<your-key-here>')
        ->model()
        ->availableList()
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}