<?php

namespace app\controllers;

use app\models\Category;
use app\rest\ActiveController;

/**
 * Class CategoriesController
 *
 * REST API for managing `Category` records.
 *
 * @see Category
 */
class CategoriesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Category::class;
}
