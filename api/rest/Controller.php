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
     * @inheritdoc
     *
     * @return array List of behaviours being changed
     */
    public function behaviors(): array
    {
        return ['cors' => ['class' => Cors::class]];
    }
}
