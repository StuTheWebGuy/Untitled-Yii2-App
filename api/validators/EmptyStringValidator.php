<?php

declare(strict_types=1);

namespace app\validators;

use Yii;
use yii\validators\Validator;

class EmptyStringValidator extends Validator
{
    public $skipOnEmpty = false;
    public $skipOnError = false;

    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute): void
    {
        /**
         * Changes empty strings into null values
         */
        if ($model->$attribute === '')
        {
            $model->$attribute = null;
        }
    }
}
