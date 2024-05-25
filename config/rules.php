<?php
return [
    "general"  => [
        "mobile"        => [
            "digits" => 12,
        ],
        "phone"        => [
            "min" => 3,
            "max" => 11,
        ],
        "national_code" => [
            "digits" => 10,
        ],
        "first_name"    => [
            "min" => 2,
            "max" => 70,
        ],
        "last_name"     => [
            "min" => 2,
            "max" => 70,
        ],
        "address"     => [
            "min" => 10,
            "max" => 200,
        ],
        "name"     => [
            "min" => 3,
            "max" => 100,
        ],
    ],
    'collection' => [
        'webhook_url' => [
            'min' => 20,
            'max' => 220,
        ],
    ],
];
