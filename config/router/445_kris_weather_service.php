<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Kris weather service",
            "mount" => "weather",
            "handler" => "\Kris3XIQ\Controller\KrisWeatherController",
        ],
    ]
];
