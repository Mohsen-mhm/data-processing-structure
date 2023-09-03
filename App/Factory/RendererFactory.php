<?php

namespace App\Factory;


use App\Renderer\HTMLRenderer;
use App\Renderer\JSONRenderer;
use App\Renderer\TextPlainRenderer;
use Exception;

class RendererFactory
{
    /**
     * @throws Exception
     */
    public static function createRenderer($type)
    {
        switch ($type) {
            case 'text':
                return new TextPlainRenderer();
            case 'html':
                return new HTMLRenderer();
            case 'json':
                return new JSONRenderer();
            default:
                throw new Exception("Unsupported format: $type");
        }
    }
}