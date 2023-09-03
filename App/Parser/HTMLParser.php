<?php

namespace App\Parser;

class HTMLParser
{
    public function parse($data) {
        // Parsing data in HTML format
        return strip_tags($data);
    }
}