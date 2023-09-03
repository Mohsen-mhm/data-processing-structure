<?php

namespace App\Parser;

class JSONParser
{
    public function parse($data) {
        // Parsing data in JSON format
        return json_decode($data);
    }
}