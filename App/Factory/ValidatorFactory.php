<?php

namespace App\Factory;


use App\Validator\HTMLValidator;
use App\Validator\JSONValidator;
use App\Validator\TextPlainValidator;
use Exception;

class ValidatorFactory
{
    /**
     * @throws Exception
     */
    public static function createValidator($type)
    {
        switch ($type) {
            case 'text':
                return new TextPlainValidator();
            case 'html':
                return new HTMLValidator();
            case 'json':
                return new JSONValidator();
            default:
                throw new Exception("Unsupported format: $type");
        }
    }
}