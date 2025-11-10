<?php

namespace app\controllers;

use app\rest\ActiveController;
use app\models\User;

/**
 * Class UsersController
 *
 * REST API for managing `User` records.
 *
 * @see User
 */
class UsersController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = User::class;
}
