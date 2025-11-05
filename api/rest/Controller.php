<?php

namespace app\rest;

use yii\filters\Cors;
use yii\rest\Serializer;

class Controller extends \yii\rest\Controller
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
        return ['cors' => ['class' => Cors::class]];
    }
}