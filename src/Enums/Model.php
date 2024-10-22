<?php

namespace CeytekLabs\OpenAI\Enums;

enum Model: string
{
    case TTS_1 = 'tts-1';
    case TTS_1_1106 = 'tts-1-1106';
    case DALL_E_2 = 'dall-e-2';
    case GPT_3_5_TURBO_INSTRUCT = 'gpt-3.5-turbo-instruct';
    case GPT_3_5_TURBO_0125 = 'gpt-3.5-turbo-0125';
    case GPT_3_5_TURBO = 'gpt-3.5-turbo';
    case BABBAGE_002 = 'babbage-002';
    case DAVINCI_002 = 'davinci-002';
    case DALL_E_3 = 'dall-e-3';
    case TTS_1_HD = 'tts-1-hd';
    case TTS_1_HD_1106 = 'tts-1-hd-1106';
    case TEXT_EMBEDDING_ADA_002 = 'text-embedding-ada-002';
    case GPT_3_5_TURBO_16K = 'gpt-3.5-turbo-16k';
    case TEXT_EMBEDDING_3_SMALL = 'text-embedding-3-small';
    case TEXT_EMBEDDING_3_LARGE = 'text-embedding-3-large';
    case WHISPER_1 = 'whisper-1';
    case GPT_3_5_TURBO_1106 = 'gpt-3.5-turbo-1106';
    case GPT_3_5_TURBO_INSTRUCT_0914 = 'gpt-3.5-turbo-instruct-0914';
    case GPT_4O_MINI = 'gpt-4o-mini';
    case GPT_4O_MINI_2024_07_18 = 'gpt-4o-mini-2024-07-18';
}
