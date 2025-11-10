<?php

namespace app\rest;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\Serializer;

class ActiveController extends \yii\rest\ActiveController
{
    /**
     * @inheritdoc
     */
    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['cors' => ['class' => Cors::class]]);
    }
}