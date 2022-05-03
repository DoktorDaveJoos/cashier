<?php

namespace App\Models;

use JetBrains\PhpStorm\ArrayShape;

class PaymentSteps
{

    private ?User $user;
    private array $errors;

    /**
     * @param array $errors
     * @param User|null $user
     */
    public function __construct(?User $user = null, array $errors = [])
    {
        $this->errors = $errors;
        $this->user = $user;
    }

    public function toJson()
    {
        return [
            'errors' => $this->errors,
            'user' => $this->user,
        ];
    }

    public static function withErrors(array $errors)
    {
        $ps = new PaymentSteps(null, $errors);
        return $ps->toJson();
    }

    public static function withUser(User $user)
    {
        $ps = new PaymentSteps($user);
        return $ps->toJson();
    }

}

