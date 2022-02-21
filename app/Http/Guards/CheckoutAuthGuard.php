<?php

namespace App;


use App\Models\Checkout;
use App\Providers\CheckoutAuthProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;

class CheckoutAuthGuard implements Guard
{
    private $provider;
    private $checkout;

    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
        $this->checkout = null;
    }

    public function check()
    {
        return isset($this->checkout);
    }

    public function guest()
    {
        return !isset($this->checkout);
    }

    public function user()
    {
        if (isset($this->checkout)) {
            return $this->checkout;
        }
    }

    public function id()
    {
        if (isset($this->checkout)) {
            return $this->checkout->getAuthIdentifier();
        }
    }

    public function validate(array $credentials = [])
    {
        return true;
    }

    public function setUser(Authenticatable $user)
    {
        $this->checkout = $user;
    }

    public function hasUser()
    {
        // TODO: Implement hasUser() method.
    }
}
