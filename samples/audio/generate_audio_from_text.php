<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;
use CeytekLabs\OpenAI\Enums\Voice;

try {
    $openai = OpenAI::make($key)->audioSpeech()
        ->setModel(Model::TTS_1)
        ->setInput('The quick brown fox jumped over the lazy dog.')
        ->setVoice(Voice::Shimmer)
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}