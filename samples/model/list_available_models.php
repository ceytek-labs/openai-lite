<?php

use CeytekLabs\OpenAI\OpenAI;

try {
    $openai = OpenAI::make($key)->modelList()
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}