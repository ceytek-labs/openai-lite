<?php

use CeytekLabs\OpenAI\OpenAI;

try {
    $openai = OpenAI::make($key)
        ->audio()
        ->createTranscription()
        ->setFile(__DIR__.'/speeches/speech1.mp3')
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}