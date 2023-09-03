<?php

namespace App\Renderer;

class JSONRenderer
{
    public function render($data) {
        // Render data to JSON format
        return json_encode($data);
    }
}