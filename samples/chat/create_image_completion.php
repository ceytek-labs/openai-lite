<?php

use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)
        ->chat()
        ->createImageCompletion()
        ->setModel(Model::GPT_4_TURBO)
        ->ask('What is in this image', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Gfp-wisconsin-madison-the-nature-boardwalk.jpg/2560px-Gfp-wisconsin-madison-the-nature-boardwalk.jpg');

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}