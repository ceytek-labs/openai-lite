<?php

namespace CeytekLabs\OpenAI\Enums\Audio\Transcription;

enum ResponseFormat: string
{
    case Json = 'json';
    case Text = 'text';
    case Srt = 'srt';
    case VerboseJson = 'verbose_json';
    case Vtt = 'vtt';
}