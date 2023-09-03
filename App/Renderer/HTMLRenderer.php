<?php

namespace App\Renderer;

class HTMLRenderer
{
    public function render($data) {
        // Render data to HTML format
        return htmlspecialchars($data);
    }
}