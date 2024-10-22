<?php

namespace CeytekLabs\OpenAI\Endpoints\Audio;

use CeytekLabs\OpenAI\Enums\Model;
use CeytekLabs\OpenAI\Enums\Voice;

class AudioSpeech
{
    private string $api;

    private string $key;

    private Model $model;

    private string $input;

    private Voice $voice;

    private \stdClass $response;

    public static function make(string $api, string $key)
    {
        $instance = new self;

        $instance->api = $api;
        $instance->key = $key;

        return $instance;
    }

    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function setInput(string $content): self
    {
        $this->input = $content;

        return $this;
    }

    public function setVoice(Voice $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    public function ask(string $directory = 'speeches', string $filename = 'speech1'): self
    {
        $fields = [];

        if (! isset($this->model)) {
            throw new \Exception('Please set your model');
        }

        $fields['model'] = $this->model->value;

        if (! isset($this->input)) {
            throw new \Exception('Please set your input');
        }

        $fields['input'] = $this->input;

        if (! isset($this->voice)) {
            throw new \Exception('Please set your voice');
        }

        $fields['voice'] = $this->voice->value;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api.'/audio/speech',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->key,
            ],
            CURLOPT_POSTFIELDS => json_encode($fields),
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: '.curl_error($curl));
        }

        curl_close($curl);

        mkdir($directory, 0777, true);

        $path = $directory.'/'.$filename.'.mp3';

        $outputFile = fopen($path, 'w');

        fwrite($outputFile, $response);
        fclose($outputFile);

        $this->response = new \stdClass();
        $this->response->message = 'speech created successfully';
        $this->response->path = $path;

        return $this;
    }

    public function getResponse(): \stdClass
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response;
    }
}