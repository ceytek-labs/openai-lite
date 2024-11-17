<?php

namespace CeytekLabs\OpenAI\Enums;

enum Speed: string
{
    case Quarter = '0.25';
    case Half = '0.5';
    case Normal = '1.0';
    case OneAndAHalf = '1.5';
    case Double = '2.0';
    case Triple = '3.0';
    case Quadruple = '4.0';
}