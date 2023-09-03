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

    $validator = ValidatorFactory::createValidator($type); // Data format detection and validation data based on it

    if ($validator->validate($data)) {
        $parser = ParserFactory::createParser($type); // Data format detection and parsing data based on it
        $parsedData = $parser->parse($data);

        $renderer = RendererFactory::createRenderer($type); // Data format detection and rendering data based on it

        $renderedData = [ // Specify the output format
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