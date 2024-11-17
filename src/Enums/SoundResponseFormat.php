<?php

namespace CeytekLabs\OpenAI\Enums;

enum SoundResponseFormat: string
{
    case Mp3 = 'mp3';
    case Opus = 'opus';
    case Aac = 'aac';
    case Flac = 'flac';
    case Wav = 'wav';
    case Pcm = 'pcm';
}