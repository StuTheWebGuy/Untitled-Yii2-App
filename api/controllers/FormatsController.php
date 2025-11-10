<?php

namespace app\controllers;

use app\models\Format;
use app\rest\ActiveController;

/**
 * Class FormatsController
 *
 * REST API for managing `Format` records.
 *
 * @see Format
 */
class FormatsController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Format::class;
}
