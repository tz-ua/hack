<?php

/**
 * This file contains all common annotations for L5-Swagger
 *
 * To manually regenerate swagger yaml/json files use command:
 * php artisan l5-swagger:generate
 * or set .env variable L5_SWAGGER_GENERATE_ALWAYS to true to automatically generate swagger files
 *
 * Swagger url: /api/documentation
 *
 * @link https://github.com/DarkaOnLine/L5-Swagger
 * @link https://github.com/zircote/swagger-php/blob/master/docs/Getting-started.md
 */



/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="hack",
 *      description="Documentation for hackaton project",
 *      @OA\Contact(
 *          email="mail@example.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

/**
 * Tags
 *
 * @OA\Tag(
 *     name="Authorization",
 *     description="Admin login and other authorization related actions",
 * )
 *
 * @OA\Tag(
 *     name="Workplace",
 *     description="Entity describing working place of User",
 * )
 *
 * @OA\Tag(
 *     name="User",
 *     description="Member of Hero Teams",
 * )
 *
 * @OA\Tag(
 *     name="LeaveRequest",
 *     description="User's leave request",
 * )
 */

/**
 * Common Schema Objects
 *
 * @OA\Schema(
 *      schema="ApiResponse",
 *      title="Api response",
 *      description="Common Api response",
 *      @OA\Property(
 *          property="message",
 *          type="string",
 *          title="Message",
 *          description="Message",
 *          example="Specific response message",
 *      )
 * )
 *
 * @OA\Schema(
 *     schema="TestJsonRequest",
 *     description="Admin categroy validation request",
 *     title="Admin categroy validation request",
 *     @OA\Property(
 *         property="fieldName",
 *         description="test field",
 *         type="string",
 *         example="Example value",
 *         minLength=1,
 *         maxLength=255
 *     )
 * )
 */
