<?php

namespace App\Factory;


use App\Parser\HTMLParser;
use App\Parser\JSONParser;
use App\Parser\TextPlainParser;
use Exception;

class ParserFactory
{
    /**
     * @throws Exception
     */
    public static function createParser($type)
    {
        switch ($type) {
            case 'text':
                return new TextPlainParser();
            case 'html':
                return new HTMLParser();
            case 'json':
                return new JSONParser();
            default:
                throw new Exception("Unsupported format: $type");
        }
    }
}