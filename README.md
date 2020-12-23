Anax module for Weather service
=========================
## Badges
Travis:
[![Build Status](https://www.travis-ci.com/Kris3XIQ/module.svg?branch=main)](https://www.travis-ci.com/Kris3XIQ/module)
Scrutinizer:
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Kris3XIQ/module/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Kris3XIQ/module/?branch=main)  
[![Build Status](https://scrutinizer-ci.com/g/Kris3XIQ/module/badges/build.png?b=main)](https://scrutinizer-ci.com/g/Kris3XIQ/module/build-status/main)  
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Kris3XIQ/module/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
## Installation
---
### Step 1
Install using composer:  
`composer require kris3xiq/weatherservice`

### Step 2
Be in the root of your ANAX installation and run:  
`bash vendor/kris3xiq/weatherservice/install.bash`

### Step 3
Add your own API-keys to IPStack and OpenWeatherMap. If you open up your config directory you will
notice the file api-keys-example. Follow the instructions given in the file.

### Step 4
All you need to do now is to add the module to your ANAX navbar. Go into config/navbar/header.php
Add the following lines into the menu-item array.
```
[
    "text" => "Weather service",
    "url" => "weather",
    "title" => "Weather service",
    "submenu" => [
        "items" => [
            [
                "text" => "Weather service",
                "url" => "weather",
                "title" => "IP-Geolocator.",
            ],
            [
                "text" => "Weather service API(JSON)",
                "url" => "weather-api",
                "title" => "Weather service API(JSON).",
            ],
        ],
    ],
],
```
