<?php

namespace CeytekLabs\OpenAI\Enums\Audio;

enum ScriptResponseFormat: string
{
    case Json = 'json';
    case Text = 'text';
    case Srt = 'srt';
    case VerboseJson = 'verbose_json';
    case Vtt = 'vtt';
}