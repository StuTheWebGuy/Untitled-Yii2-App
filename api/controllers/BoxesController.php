<?php

namespace app\controllers;

use app\models\Box;
use app\rest\ActiveController;

/**
 * Class BoxesController
 *
 * REST API for managing `Box` records.
 *
 * @see Box
 */
class BoxesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Box::class;
}
