<?php

namespace app\rest;

use yii\filters\Cors;

class Controller extends \yii\rest\Controller
{
    public function behaviors(): array
    {
        return ['cors' => ['class' => Cors::class]];
    }
}
