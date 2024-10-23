<?php

namespace CeytekLabs\OpenAI\Endpoints\Audio;

use CeytekLabs\OpenAI\Enums\Audio\ScriptResponseFormat;
use CeytekLabs\OpenAI\Enums\Audio\WhisperModel;

class CreateTranscription
{
    private string $api;

    private string $key;

    private string $file;

    private WhisperModel $model = WhisperModel::WHISPER_1;

    private ScriptResponseFormat $responseFormat = ScriptResponseFormat::Json;

    private \stdClass|string $response;

    public static function make(string $api, string $key)
    {
        $instance = new self;

        $instance->api = $api;
        $instance->key = $key;

        return $instance;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function setModel(WhisperModel $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function setResponseFormat(ScriptResponseFormat $responseFormat): self
    {
        $this->responseFormat = $responseFormat;

        return $this;
    }

    public function ask(): self
    {
        $fields = [
            'response_format' => $this->responseFormat->value,
        ];

        if (! isset($this->file)) {
            throw new \Exception('Please set your file');
        }

        $fields['file'] = new \CURLFile($this->file);

        if (! isset($this->model)) {
            throw new \Exception('Please set your model');
        }

        $fields['model'] = $this->model->value;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api.'/audio/transcriptions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.$this->key,
                'Content-Type: multipart/form-data',
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $fields,
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Error: '.curl_error($curl));
        }

        curl_close($curl);

        $this->response = $this->responseFormat === ScriptResponseFormat::Json
            ? json_decode($response)
            : $response;

        return $this;
    }

    public function getResponse(): \stdClass|string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        return $this->response;
    }

    public function getText(): string
    {
        if (! isset($this->response)) {
            throw new \Exception('Please ask first');
        }

        if ($this->responseFormat !== ScriptResponseFormat::Json) {
            throw new \Exception('Please set your response format as Json');
        }

        return $this->response->text;
    }
}