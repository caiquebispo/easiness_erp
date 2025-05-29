<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;
#[
    OA\Info(
    title: "API ERP",
        version: "1.0.0",
        description: ' This is a simple API for an ERP system, built with Laravel and OpenAPI documentation.',
    ),

    OA\Contact(email: 'caiquebispodanet86@gmail.com'),

    OA\SecurityScheme(
        securityScheme: "bearerAuth",
        in: "header",
        name: "bearerAuth",
        type: "http",
        scheme: "bearer",
        bearerFormat: "JWT",
    ),
    OA\Server(
        url: L5_SWAGGER_CONST_HOST,
        description: "API Server"
    )
]
abstract class Controller
{
    //
}
