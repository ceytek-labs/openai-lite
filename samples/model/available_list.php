<?php

use CeytekLabs\OpenAI\OpenAI;

try {
    $openai = OpenAI::make($key)
        ->model()
        ->availableList()
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}