<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Audio\TTSModel;
use CeytekLabs\OpenAI\Enums\Audio\Voice;

try {
    $openai = OpenAI::make($key)
        ->audio()
        ->createSpeech()
        ->setModel(TTSModel::TTS_1)
        ->setInput('The quick brown fox jumped over the lazy dog.')
        ->setVoice(Voice::Shimmer)
        ->ask();

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}