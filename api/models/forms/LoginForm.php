<?php

declare(strict_types=1);

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

/**
 * Form model for validating user input during login.
 */
class LoginForm extends Model
{
    /**
     * @var string|null The user's username.
     */
    public ?string $username;

    /**
     * @var string|null The user's password.
     */
    public ?string $password;

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
                'Username and password don\'t match',
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

        $isMatches = User::find()
            ->where([
                'username' => $this->username,
                'password' => $this->$attribute,
            ])
            ->exists();

        if (!$isMatches) {
            $this->addError(
                $attribute,
                'Username and password don\'t match',
            );
        }
    }
}
