<?php

namespace app\controllers;

use app\models\ImagesCollection;
use yii\rest\ActiveController;

/**
 * Class ImagesCollectionsController
 *
 * REST API for managing `ImagesCollection` records.
 *
 * @see ImagesCollection
 */
class ImagesCollectionsController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = ImagesCollection::class;
}
