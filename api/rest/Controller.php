<?php

namespace app\rest;

use yii\filters\Cors;

/**
 * Class Controller
 *
 * Extends yii2's Controller class to add functionality.
 *
 * - Adds Cors handling
 */
class Controller extends \yii\rest\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ['cors' => ['class' => Cors::class]];
    }
}
