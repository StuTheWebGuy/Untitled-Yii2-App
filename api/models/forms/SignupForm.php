<?php

declare(strict_types=1);

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Exception;

/**
 * todo
 */
class SignupForm extends User
{
    public ?string $new_password;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        $parentRules = parent::rules();

        unset($parentRules['passwordRequired']);

        return array_merge(
            [
                [['new_password'], 'trim'],
                [['new_password'], 'required'],
                [['new_password'], 'string'],
            ],
            $parentRules,
        );
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function beforeValidate(): bool
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        if ($this->auth_key === null) {
            $this->auth_key = Yii::$app->security->generateRandomString(32);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function afterValidate(): void
    {
        parent::afterValidate();

        if ($this->password === null && !$this->hasErrors()) {
            $this->password = Yii::$app->security->generatePasswordHash($this->new_password);
            $this->validate(['password'], false);
        }
    }

    /**
     * todo
     */

}
