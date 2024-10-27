<p align="center">
    <img src="https://raw.githubusercontent.com/ceytek-labs/openai/refs/heads/1.x/art/banner.png" width="400" alt="Google Services Lite">
    <p align="center">
        <a href="https://packagist.org/packages/ceytek-labs/openai"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/ceytek-labs/openai"></a>
        <a href="https://packagist.org/packages/ceytek-labs/openai"><img alt="Latest Version" src="https://img.shields.io/packagist/v/ceytek-labs/openai"></a>
        <a href="https://packagist.org/packages/ceytek-labs/openai"><img alt="Size" src="https://img.shields.io/github/repo-size/ceytek-labs/openai"></a>
        <a href="https://packagist.org/packages/ceytek-labs/openai"><img alt="License" src="https://img.shields.io/packagist/l/ceytek-labs/openai"></a>
    </p>
</p>

------

# OpenAI - ChatGPT API Library

**OpenAI - ChatGPT API Library** is a lightweight and extensible library designed to simplify your interaction with OpenAI APIs in PHP. With this library, you can create speech, transcriptions, chat completions, and more.

> **Disclaimer:** This package is not an official product of OpenAI. The developers accept no responsibility for any issues, discrepancies, or damages that may arise from its use.

## Requirements

- PHP 8.1 or higher

## Installation

You can add this package to your project via Composer:

```bash
composer require ceytek-labs/openai
```

## Services

- [Audio Processing](#audio-processing)
    - [Create Speech](#audio-processing-create-speech)
    - [Create Transcription](#audio-processing-create-transcription)
- [Chat Completion](#chat-completion)
    - [Text Completion](#chat-completion-text-completion)
    - [Image Recognition](#chat-completion-image-recognition)
- [Model Management](#model-management)
    - [Available Models List](#model-management-available-models-list)
    - [Retrieve Model Information](#model-management-retrieve-model-information)

## Audio Processing

This function provides easy integration with OpenAI’s TTS and transcription services.

### Example Usage

The following example demonstrates how to update data in a **Audio Processing** document:

**[⬆ Back to services](#services)**

#### Audio Processing: Create Speech

This feature allows you to convert text to speech using a specified TTS model and voice.

```php
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
```

**[⬆ Back to services](#services)**

#### Audio Processing: Create Transcription

This function transcribes audio files into text, accepting various audio formats.

```php
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
```

**[⬆ Back to services](#services)**

## Chat Completion

Chat completion features provide flexible options for text and image-based conversations.

### Example Usage

The following example demonstrates how to update data in a **Chat Completion** document:

**[⬆ Back to services](#services)**

#### Chat Completion: Text Completion

Generates a text-based response based on a given prompt.

```php
use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)
        ->chat()
        ->createCompletion()
        ->setModel(Model::GPT_3_5_TURBO_0125)
        ->setBehave('give your answer as json and keep it simple')
        ->ask('What is your name');

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
```

**[⬆ Back to services](#services)**

#### Chat Completion: Image Recognition

This feature enables the library to analyze and interpret images.

```php
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
```

**[⬆ Back to services](#services)**

## Model Management

Easily manage models to get information about available or specific models.

### Example Usage

The following example demonstrates how to update data in a **Model Management** document:

**[⬆ Back to services](#services)**

#### Model Management: Available Models List

Retrieve a list of all available models.

```php
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
```

**[⬆ Back to services](#services)**

#### Model Management: Retrieve Model Information

Get details about a specific model.

```php
use CeytekLabs\OpenAI\OpenAI;
use CeytekLabs\OpenAI\Enums\Model;

try {
    $openai = OpenAI::make($key)
        ->model()
        ->retrieve()
        ->ask(Model::GPT_4O_MINI);

    print_r($openai->getResponse());
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
```

## Contributing

Feel free to submit a **pull request** or report an issue. Any contributions and feedback are highly appreciated!

## License

This project is licensed under the MIT License.