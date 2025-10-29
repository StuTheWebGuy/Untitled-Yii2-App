<?php

namespace app\controllers;

use app\models\Category;
use app\rest\ActiveController;

class CategoriesController extends ActiveController
{
    public $modelClass = Category::class;
}