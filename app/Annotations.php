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
 *      title="rado",
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
 *     name="Leave Request",
 *     description="User's leave request",
 * )
 *
 * @OA\Tag(
 *     name="Book Request",
 *     description="Book request",
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
 *     schema="LeaveRequestJsonRequest",
 *     description="Leave Request validation request",
 *     title="Leave Request validation request",
 *     @OA\Property(
 *         property="user_id",
 *         description="User id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         description="Start date",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         description="End date",
 *         type="string"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="LeaveRequestJsonModel",
 *     description="Leave Request",
 *     title="Leave Request",
 *     @OA\Property(
 *         property="id",
 *         description="Id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="User id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         description="Start date",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         description="End date",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="create_at",
 *         description="Created at",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         description="Updated at",
 *         type="string"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="BookRequestJsonRequest",
 *     description="Book Request validation request",
 *     title="Book Request validation request",
 *     @OA\Property(
 *         property="user_id",
 *         description="User id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="room_id",
 *         description="Room id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="from",
 *         description="Booked from date time",
 *         type="string",
 *         example="2020-12-20 20:20:20"
 *     ),
 *     @OA\Property(
 *         property="to",
 *         description="Booked to date time",
 *         type="string",
 *         example="2020-12-20 20:20:20"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="BookRequestJsonModel",
 *     description="Book Request",
 *     title="Book Request",
 *     @OA\Property(
 *         property="id",
 *         description="Id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="User id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="room_id",
 *         description="Room id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="from",
 *         description="Booked from date time",
 *         type="string",
 *         example="2020-12-20 20:20:20"
 *     ),
 *     @OA\Property(
 *         property="to",
 *         description="Booked to date time",
 *         type="string",
 *         example="2020-12-20 20:20:20"
 *     ),
 *     @OA\Property(
 *         property="create_at",
 *         description="Created at",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         description="Updated at",
 *         type="string"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="UserSchemaRequest",
 *     description="User model for request",
 *     title="User schema request",
 *     required={"name", "email"},
 *     @OA\Property(
 *         property="name",
 *         description="Name of user",
 *         type="string",
*         example="John",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="email",
*         description="User's email address",
*         type="string",
*         example="john.doe@gmail.com",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="photo",
*         description="Link to user's photo",
*         type="string",
*         example="host.com/photo.png",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="phone",
*         description="User's mobile phone number",
*         type="string",
*         example="+380961234567",
*         minLength=1,
*         maxLength=20,
*     ),
*     @OA\Property(
*         property="position",
*         description="User's position in company",
*         type="string",
*         example="Project manager",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="team",
*         description="Team of user",
*         type="string",
*         example="Nexus",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="workplace_id",
*         description="Place where user works",
*         type="integer",
*         example=1
*     ),
* )
*
* @OA\Schema(
*     schema="UserSchemaResponse",
*     description="User model for response",
*     title="User schema response",
*     required={"name", "email"},
*     @OA\Property(
*         property="name",
*         description="Name of user",
*         type="string",
*         example="John",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="email",
*         description="User's email address",
*         type="string",
*         example="john.doe@gmail.com",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="photo",
*         description="Link to user's photo",
*         type="string",
*         example="host.com/photo.png",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="phone",
*         description="User's mobile phone number",
*         type="string",
*         example="+380961234567",
*         minLength=1,
*         maxLength=20,
*     ),
*     @OA\Property(
*         property="position",
*         description="User's position in company",
*         type="string",
*         example="Project manager",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="team",
*         description="Team of user",
*         type="string",
*         example="Nexus",
 *         minLength=1,
 *         maxLength=255,
 *     ),
 *     @OA\Property(
 *         property="workplace_id",
 *         description="Place where user works",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="online",
 *         description="Is user online",
 *         type="boolean",
 *        example=true
 *     ),
 * )
 *
 * @OA\Schema(
*     schema="WorkplaceSchemaRequest",
*     description="Workplace model for request",
*     title="Workplace schema request",
*     @OA\Property(
*         property="name",
*         description="Workplace identity name",
*         type="string",
*         example="Johnny Sins workplace",
*         minLength=1,
*         maxLength=100,
*     ),
* )
*
* @OA\Schema(
*     schema="WorkplaceSchemaResponse",
*     description="Workplace model for response",
*     title="Workplace schema response",
*     @OA\Property(
*         property="name",
*         description="Workplace identity name",
*         type="string",
*         example="Johnny Sins workplace",
*         minLength=1,
*         maxLength=100,
*     ),
*     @OA\Property(
*         property="user",
*         description="User, who works here",
*         type={"object","null"},
*         @OA\Schema(ref="#/components/schemas/UserSchemaResponse")
*     ),
* )
 */
