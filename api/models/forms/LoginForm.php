<?php

declare(strict_types=1);

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * Form model for validating user input during login.
 */
class LoginForm extends Model
{
    /**
     * @var string|null The user's username.
     */
    public ?string $username = null;

    /**
     * @var string|null The user's password.
     */
    public ?string $password = null;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'trim'],
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string'],
            [['username'], 'validateUsernameExists'],
            [['password'], 'validatePassword'],
        ];
    }

    /**
     * Validate that the username matches an existing user in the database.
     *
     * @param string $attribute Name of the attribute being validated.
     * @return void
     */
    public function validateUsernameExists(string $attribute): void
    {
        if ($this->hasErrors()) {
            return;
        }

        $isExists = User::find()
            ->where([
                'username' => $this->$attribute
            ])
            ->exists();

        if (!$isExists) {
            $this->addError(
                $attribute,
                YII_DEBUG ? 'Username doesn\'t match a user in the database.' : 'Username and password don\'t match',
            );
        }
    }

    /**
     * Validate that the password (once hashed) matches the user record in the
     * database, identified by the username.
     *
     * @param string $attribute Name of the attribute being validated.
     * @return void
     */
    public function validatePassword(string $attribute): void
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = User::find()
            ->where([
                'username' => $this->username,
            ])
            ->one();

        $isPasswordCorrect = Yii::$app->security->validatePassword($this->$attribute, $user->password);

        if (!$isPasswordCorrect) {
            $this->addError(
                $attribute,
                YII_DEBUG ? 'Password doesn\'t match the specified user in the database.' : 'Username and password don\'t match',
            );
        }
    }
}
