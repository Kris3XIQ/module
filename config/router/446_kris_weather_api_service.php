<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Kris weather API service",
            "mount" => "weather-api",
            "handler" => "\Kris3XIQ\Controller\KrisWeatherApiController",
        ],
    ]
];
