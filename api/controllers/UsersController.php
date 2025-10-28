<?php

namespace app\controllers;

use app\rest\ActiveController;
use app\models\User;

class UsersController extends ActiveController
{
    public $modelClass = User::class;
}
