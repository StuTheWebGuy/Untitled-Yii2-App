<?php

namespace app\rest;

use yii\filters\Cors;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors(): array
    {
        return ['cors' => ['class' => Cors::class]];
    }
}
