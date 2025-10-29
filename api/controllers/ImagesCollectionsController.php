<?php

namespace app\controllers;

use app\models\ImagesCollection;
use yii\rest\ActiveController;

class ImagesCollectionsController extends ActiveController
{
    public $modelClass = ImagesCollection::class;
}
