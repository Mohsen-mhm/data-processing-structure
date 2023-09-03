<?php

use App\Factory\ParserFactory;
use App\Factory\RendererFactory;
use App\Factory\ValidatorFactory;

require_once('vendor/autoload.php');


try {
    /**
     * [
     *  "type" => "json | text | html | ...",
     *  "data" => "Your data here"
     * ]
     */
    $input = $_POST; // Get data by sending POST request - send form-data

    if ($input === null) {
        throw new Exception("Invalid JSON input data.");
    }

    $type = $input['type'];
    $data = $input['data'];

    $validator = ValidatorFactory::createValidator($type);

    if ($validator->validate($data)) {
        $parser = ParserFactory::createParser($type);
        $parsedData = $parser->parse($data);

        $renderer = RendererFactory::createRenderer($type);

        $renderedData = [
            'type' => $type,
            'value' => $renderer->render($parsedData)
        ];

        echo json_encode($renderedData); // Output

    } else {
        echo "Invalid input data.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}